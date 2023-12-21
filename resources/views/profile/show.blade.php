<x-app-layout>
    <div class="container mx-auto px-4 pb-24 pt-16 sm:px-6 max-w-4xl lg:px-8 text-text text-sm">
        <h2 class="text-4xl font-bold font-heading">Profile</h2>
        <!-- Personal Information -->
        <h2 class="text-3xl font-bold mt-10 font-heading">Personal information</h2>
        <p class="mt-2 text-sm text-gray-500">View and update your profile information</p>
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
                        <div class="mt-4 font-bold text-base">Name:</div>
                        <div class="mt-1"> {{ $user->name }}</div>
                    </div>
                    <div>
                        <div class="mt-4 font-bold text-base">Email:</div>
                        <div class="mt-1">{{ $user->email }}</div>
                    </div>
                    <div class="mt-4 font-bold text-base">Bio:</div>
                    <div class="mt-1">{{ $user->profile->bio }}</div>
                </div>
            </div>
            @if ($user->id === auth()->id())
                <div class="relative mt-16 mb-4">
                    <a href="{{ route('profile.edit', auth()->user()->id) }}"><button type="submit"
                            class="absolute bottom-0 right-0 inline-flex justify-center w-28 rounded-md bg-primary px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-all delay-[10ms]">Edit
                            Profile
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-4 h-34">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </button>
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
                    <p class="mt-2 text-sm text-gray-500">View and manage your products</p>
                    <div class="flex justify-end">
                        <button
                            class="rounded-md bg-primary flex justify-center gap-1 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-all delay-[10ms]">
                            <a href="{{ route('products.create') }}">Create
                                a new Product</a>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                            </svg>

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
                                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80 transition-all delay-[10ms]">
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
                                            class="flex justify-center gap-1 rounded-md bg-red-600 hover:bg-red-500 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-all delay-[10ms] z-50"><a
                                                href="{{ route('products.show', $product->id) }}">Delete</a><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg></button>
                                        <!-- Edit Button -->
                                        <button
                                            class="flex justify-center gap-1 rounded-md bg-blue-600 hover:bg-blue-500 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-all delay-[10ms] z-50">
                                            <a href="{{ route('products.edit', $product->id) }}">Edit </a><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg></button>
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

        <div x-data="{ showAll: true }">
            @if ($user->id === auth()->id())
                <!-- Your Orders -->
                <section class="py-16 sm:pb-24 sm:pt-12">
                    <div class="flex justify-end">
                        <button x-on:click="showAll = !showAll"
                            class="rounded-md bg-primary flex justify-center gap-1 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-all delay-[10ms]">
                            <span x-text="showAll ? 'Show Pending Orders' : 'Show All Orders'"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                            </svg>

                        </button>
                    </div>
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
                            <div x-data="{ isOrderCompleted: @json($isOrderCompleted) }" x-show="showAll || !isOrderCompleted">
                                <section class="mb-6" aria-labelledby="{{ $orderNumber }}-heading">
                                    <div class="space-y-1 md:flex md:items-baseline md:space-x-4 md:space-y-0">
                                        <h2 id="{{ $orderNumber }}-heading"
                                            class="text-xl font-medium text-gray-900 md:flex-shrink-0">Order
                                            #{{ $orderNumber }}</h2>
                                        @if ($isOrderCompleted)
                                            <div
                                                class="space-y-5 sm:flex sm:items-baseline sm:justify-end sm:space-y-0 md:min-w-0 md:flex-1">
                                                <h3
                                                    class="inline-flex items-center text-green-500 font-medium text-base">
                                                    <span>Delivery Successful</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="ml-2 w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M4.5 12.75l6 6 9-13.5" />
                                                    </svg>
                                                </h3>
                                            </div>
                                        @endif
                                    </div>
                                    @foreach ($transactions as $transaction)
                                        <div
                                            class="-mb-6 mt-6 flow-root divide-y divide-gray-200 border-t border-gray-200">
                                            <div class="py-6 sm:flex">
                                                <div
                                                    class="flex space-x-4 sm:min-w-0 sm:flex-1 sm:space-x-6 lg:space-x-8">
                                                    <img src="{{ Storage::url($transaction->product->images->first()->resized_image_path) }}"
                                                        alt="{{ $transaction->product->first()->alt_text }}"
                                                        class="h-20 w-20 flex-none rounded-md object-cover object-center sm:h-48 sm:w-48">
                                                    <div class="min-w-0 flex-1 pt-1.5 sm:pt-0">
                                                        <h3 class="font-medium text-gray-900 text-xl">
                                                            <a
                                                                href="{{ route('products.show', $transaction->product->id) }}">{{ $transaction->product->name }}</a>
                                                        </h3>
                                                        <p class="mt-1 text-base font-medium text-gray-900">
                                                            Quantity: {{ $transaction->quantity }}</p>
                                                        <p class="mt-1 text-base font-medium text-gray-900">
                                                            Price: {{ $transaction->product->price }} €</p>
                                                        <p
                                                            class="mt-24 text-base font-medium text-gray-900 flex gap-2">
                                                            @if ($transaction->status == 'sent')
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor"
                                                                    class="ml-2 w-6 h-6 text-green-500">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M4.5 12.75l6 6 9-13.5" />
                                                                </svg> Delivered on
                                                                {{ $transaction->updated_at->format('F j, Y') }}
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                                                </svg>
                                                                Out for delivery
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                </section>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </div>
</x-app-layout>
