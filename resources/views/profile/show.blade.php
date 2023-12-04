<x-app-layout>
    <div class="container mx-auto px-4 pb-24 pt-16 sm:px-6 max-w-4xl lg:px-8 text-text text-sm">
        <h2 class="text-4xl font-bold font-heading">Profile</h2>
        <!-- Personal Information -->
        <h2 class="text-2xl mt-10 font-heading">Personal information</h2>
        <section class="mt-6 border-t border-b border-gray-300 pt-8 pb-6 h-fit">
            <div class="md:flex justify-center">
                <div class="flex justify-center items-center">
                    @if ($user->profile->profile_picture !== null)
                        <img src="{{ Storage::url($user->profile->profile_picture) }}" alt=""
                            class="w-60 h-60 rounded-full">
                        </img>
                    @else
                        @php
                            function getUserInitials($name)
                            {
                                return collect(explode(' ', $name))
                                    ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                                    ->join('');
                            }
                        @endphp
                        <span class="inline-flex h-28 w-28 items-center justify-center rounded-full bg-gray-500">
                            <span class="text-3xl font-medium leading-none text-white">
                                {{ getUserInitials($user->name) }}</span>
                        </span>
                    @endif
                </div>
                <div class="md:ml-10">
                    <div>
                        <div class="mt-4 font-bold">Name:</div>
                        <div class="mt-1"> {{ $user->name }}</div>
                    </div>
                    <div>
                        <div class="mt-4 font-bold">Email:</div>
                        <div class="mt-1">{{ $user->email }}</div>
                    </div>
                    <div>

                    </div>
                    <div class="mt-4 font-bold">Bio:</div>
                    <div class="mt-1">{{ $user->profile->bio }}</div>
                </div>
            </div>
            <div class="relative mt-16 mb-4">
                <a href="{{ route('profile.edit', auth()->user()->id) }}"><button type="submit"
                        class="absolute bottom-0 right-0 w-20 py-2 bg-accent hover:bg-primary rounded-md text-white">Edit</button>
                </a>

            </div>
        </section>

        @php
            $hasProducts = sizeof($user->products) > 0;
            $hasOrders = sizeof($user->transactions) > 0;
        @endphp

        @if ($user->isArtisan)
            <!-- Your Products -->
            <section class="border-b border-gray-300 mt-6 pb-8">
                <h3 class="text-3xl font-heading">Your Products</h3>
                @if ($hasProducts)
                    <div class="mt-6 grid grid-cols-1 gap-x-3 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-3">
                        @foreach ($user->products as $product)
                            <div class="group relative">
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
                                <div class="mt-2 flex justify-center gap-4">
                                    <button>Delete</button>
                                    <button>Edit</button>
                                </div>
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

        <!-- Your Orders -->
        <section class="border-b border-gray-300 pb-6 ">
            <h3 class="text-2xl mb-4 mt-6 font-heading">Your Orders</h3>
            @if ($hasOrders)
                @php
                    $groupedTransactions = [];
                    foreach ($user->transactions as $transaction) {
                        $date = strval($transaction->created_at);

                        if (!isset($groupedTransactions[$date][0])) {
                            $groupedTransactions[$date] = [];
                        }
                        array_push($groupedTransactions[$date], $transaction);
                    }
                @endphp
                @foreach ($groupedTransactions as $date => $transactions)
                    <div class="text-xl mt-6">Ordered on: {{ $transaction->created_at->format('Y-m-d H:i') }}</div>
                    <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-4 my-4 bg-light-grey rounded-md">
                        @foreach ($transactions as $transaction)
                            <div class="mt-4 mb-4 justify-between grid p-4">
                                <div class="flex relative">
                                    <div class="mr-4">
                                        <img class="w-32 h-32 rounded-md"
                                            src="{{ Storage::url($transaction->product->images->first()->thumbnail_image_path) }}"></img>
                                    </div>
                                    <div class="relative">
                                        <div class="font-medium">{{ $transaction->product->name }}</div>
                                        <div class="mt-4">Quantity: {{ $transaction->quantity }} pcs.</div>
                                        <div class="mt-4">Price: {{ $transaction->total_price }} €</div>
                                        <div class="mt-4">Status: {{ $transaction->status }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @else
                <div>You havn't ordered anything yet.</div>
                <a href="{{ route('products.index') }}">Visit the product page to order something.</a>
            @endif
        </section>
    </div>
</x-app-layout>
