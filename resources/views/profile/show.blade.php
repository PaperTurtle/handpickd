<x-app-layout>
    <div class="container mx-auto px-4 pb-24 pt-16 sm:px-6 max-w-4xl lg:px-8 text-text text-sm">
        <h2 class="text-4xl font-bold font-heading">Profile</h2>
        <!-- Personal Information -->
        <h2 class="text-3xl font-bold mt-10 font-heading">Personal information</h2>
        <section class="mt-6 border-t border-b border-gray-300 pt-8 pb-6 h-fit">
            <div class="md:flex">
                @if ($user->profile->profile_picture !== null)
                    <img src="{{ Storage::url($user->profile->profile_picture) }}" alt="{{ $user->name }}"
                        class="w-60 h-60 rounded-full flex-shrink-0">
                    </img>
                @else
                    <span
                        class="inline-flex h-28 w-28 items-center justify-center rounded-full bg-gray-500 flex-shrink-0">
                        <span class="text-3xl font-medium leading-none text-white">
                            {{ getUserInitials($user->name) }}</span>
                    </span>
                @endif
                <div class="md:ml-10">
                    <div>
                        <div class="mt-4 font-bold">Name:</div>
                        <div class="mt-1"> {{ $user->name }}</div>
                    </div>
                    <div>
                        <div class="mt-4 font-bold">Email:</div>
                        <div class="mt-1">{{ $user->email }}</div>
                    </div>
                    <div class="mt-4 font-bold">Bio:</div>
                    <div class="mt-1">{{ $user->profile->bio }}</div>
                </div>
            </div>
            @if ($user->id === auth()->id())
                <div class="relative mt-16 mb-4">
                    <a href="{{ route('profile.edit', auth()->user()->id) }}"><button type="submit"
                            class="absolute bottom-0 right-0 w-20 rounded-md bg-primary px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">Edit</button>
                    </a>
                </div>
            @endif
        </section>

        @php
            $hasProducts = sizeof($user->products) > 0;
            $hasOrders = sizeof($user->transactions) > 0;
        @endphp

        @if ($user->isArtisan)
            <!-- Your Products -->
            <section class="border-b border-gray-300 mt-6 pb-8">
                @if ($user->id === auth()->id())
                    <h3 class="text-3xl font-bold font-heading inline-block">Your Products</h3>
                    <div class="flex justify-end">
                        <button
                            class="rounded-md bg-primary px-2.5 py-1.5 text-md font-semibold text-white shadow-sm hover:bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-all delay-[10ms]">
                            <a href="{{ route('products.create') }}">Create
                                a new Product</a>
                        </button>
                    </div>
                @else
                    <h3 class="text-3xl font-bold font-heading">{{ $user->name }}'s Products</h3>
                @endif
                @if ($hasProducts)
                    <div class="mt-6 grid grid-cols-1 gap-x-3 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-3">
                        @foreach ($user->products as $product)
                            <div class="relative">
                                <div class="group">
                                    <!-- Product Image and Details -->
                                    <div
                                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                        <img src="{{ Storage::url($product->images->first()->resized_image_path) }}"
                                            alt="{{ $product->description }}"
                                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    </div>
                                    <div class="mt-4 flex justify-between">
                                        <div>
                                            <h3 class="text-sm text-gray-700">
                                                <a href="{{ route('products.show', $product->id) }}">
                                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                                    {{ $product->name }}
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900">{{ $product->price }} €</p>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                @if ($user->id === auth()->id())
                                    <div class="mt-2 flex justify-center gap-4">
                                        <!-- Delete Button -->
                                        <button
                                            class="rounded-md bg-red-600 hover:bg-red-500 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary z-50"><a
                                                href="{{ route('products.show', $product->id) }}">Delete</a></button>
                                        <!-- Edit Button -->
                                        <button
                                            class="rounded-md bg-blue-600 hover:bg-blue-500 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary z-50">
                                            <a href="{{ route('products.edit', $product->id) }}">Edit</a></button>
                                        <x-delete-modal :product="$product" />

                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
                @if (!$hasProducts)
                    <div class="mt-4">
                        You are registered as artisan, but you haven't uploaded any goods so far.
                    </div>
                @endif
            </section>
        @endif

        @if ($user->id === auth()->id())
            <!-- Your Orders -->
            <section class="max-w-3xl py-16 sm:pb-24 sm:pt-12">
                <div class="max-w-xl">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 font-heading">Your Order History</h1>
                    <p class="mt-2 text-sm text-gray-500">Check the status of your orders</p>
                </div>

                <div class="mt-12 space-y-16 sm:mt-16">
                    @php
                        $groupedTransactions = [];
                        foreach ($user->transactions as $transaction) {
                            $date = new \DateTime($transaction->created_at);
                            $orderNumber = $date->format('YmdHi');

                            if (!isset($groupedTransactions[$orderNumber])) {
                                $groupedTransactions[$orderNumber] = [];
                            }
                            $groupedTransactions[$orderNumber][] = $transaction;
                        }
                        krsort($groupedTransactions);
                    @endphp
                    @foreach ($groupedTransactions as $orderNumber => $transactions)
                        @php
                            $isOrderCompleted = collect($transactions)->every(fn($transaction) => $transaction->status === 'sent');
                        @endphp
                        <section class="mb-6" aria-labelledby="{{ $orderNumber }}-heading">
                            <div class="space-y-1 md:flex md:items-baseline md:space-x-4 md:space-y-0">
                                <h2 id="{{ $orderNumber }}-heading"
                                    class="text-xl font-medium text-gray-900 md:flex-shrink-0">Order
                                    #{{ $orderNumber }}</h2>
                                @if ($isOrderCompleted)
                                    <div
                                        class="space-y-5 sm:flex sm:items-baseline sm:justify-end sm:space-y-0 md:min-w-0 md:flex-1">
                                        <h3 class="inline-flex items-center text-green-500 font-medium">
                                            <span>Delivery Successful</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="ml-2 w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                        </h3>
                                    </div>
                                @endif
                            </div>
                            @foreach ($transactions as $transaction)
                                <div class="-mb-6 mt-6 flow-root divide-y divide-gray-200 border-t border-gray-200">
                                    <div class="py-6 sm:flex">
                                        <div class="flex space-x-4 sm:min-w-0 sm:flex-1 sm:space-x-6 lg:space-x-8">
                                            <img src="{{ Storage::url($transaction->product->images->first()->resized_image_path) }}"
                                                alt="{{ $transaction->product->first()->alt_text }}"
                                                class="h-20 w-20 flex-none rounded-md object-cover object-center sm:h-48 sm:w-48">
                                            <div class="min-w-0 flex-1 pt-1.5 sm:pt-0">
                                                <h3 class="font-medium text-gray-900 text-xl">
                                                    <a
                                                        href="{{ route('products.show', $transaction->product->id) }}">{{ $transaction->product->name }}</a>
                                                </h3>
                                                <p class="mt-1 text-md font-medium text-gray-900">
                                                    Q: {{ $transaction->quantity }}</p>
                                                <p class="mt-1 text-md font-medium text-gray-900">
                                                    {{ $transaction->product->price }} €</p>
                                                <p class="mt-4 font-medium text-gray-900">
                                                    Status: {{ $transaction->status }}</p>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </section>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</x-app-layout>
