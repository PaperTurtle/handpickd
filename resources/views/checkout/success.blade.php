<x-app-layout>
    @if (session('transactionDetails') && is_array(session('transactionDetails')))
        @php
            $shippingCost = 0;
            $orderPayment = 0;
        @endphp
        <main class="relative lg:min-h-full">
            <div class="h-80 overflow-hidden lg:absolute lg:h-[90%] lg:w-1/2 lg:pr-4 xl:pr-12">
                <img src="{{ URL('images/checkout.jpg') }}" alt="Checkout image"
                    class="h-full w-full object-cover object-center">
            </div>

            <div>
                <div
                    class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 lg:py-32 xl:gap-x-24">
                    <div class="lg:col-start-2">
                        <h1 class="text-sm font-medium text-primary">Payment successful</h1>
                        <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Thanks for ordering
                        </p>
                        <p class="mt-2 text-base text-gray-500">We appreciate your order, the artisan is currently
                            processing it. So
                            hang tight and we'll send you confirmation very soon!</p>
                        <ul role="list"
                            class="mt-6 divide-y divide-gray-200 border-t border-gray-200 text-sm font-medium text-gray-500">
                            @foreach (session('transactionDetails') as $transaction)
                                @php
                                    $orderPayment += number_format($transaction->total_price, 2);
                                    $shippingCost = $transaction->delivery_method === 'Standard' ? 4.99 : 12.99;
                                @endphp
                                <li class="flex space-x-6 py-6">
                                    <img src="{{ Storage::url($transaction->product->images->first()->thumbnail_image_path) }}"
                                        alt="Model wearing men&#039;s charcoal basic tee in large."
                                        class="h-24 w-24 flex-none rounded-md bg-gray-100 object-cover object-center">
                                    <div class="flex-auto space-y-1">
                                        <h3 class="text-gray-900">
                                            <a href="#">{{ $transaction->product->name }}</a>
                                        </h3>
                                        <p>{{ $transaction->quantity }}x</p>
                                    </div>
                                    <p class="flex-none font-medium text-gray-900">
                                        {{ number_format($transaction->total_price, 2) }} €
                                    </p>
                                </li>
                            @endforeach
                        </ul>

                        <dl class="space-y-6 border-t border-gray-200 pt-6 text-sm font-medium text-gray-500">
                            <div class="flex justify-between">
                                <dt>Subtotal</dt>
                                <dd class="text-gray-900">{{ number_format($orderPayment, 2) }} €</dd>
                            </div>

                            <div class="flex justify-between">
                                <dt>Shipping</dt>
                                <dd class="text-gray-900">{{ $shippingCost }} €</dd>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-200 pt-6 text-gray-900">
                                <dt class="text-base">Total</dt>
                                <dd class="text-base">{{ number_format($orderPayment, 2) + $shippingCost }} €</dd>
                            </div>
                        </dl>

                        <dl class="mt-16 grid grid-cols-2 gap-x-4 text-sm text-gray-600">
                            <div>
                                <dt class="font-medium text-gray-900">Shipping Address</dt>
                                <dd class="mt-2">
                                    <address class="not-italic">
                                        <span class="block">{{ $transaction->buyer->name }}</span>
                                    </address>
                                </dd>
                            </div>

                        </dl>

                        <div class="mt-16 border-t border-gray-200 py-6 text-right">
                            <a href="{{ route('products.index') }}"
                                class="text-sm font-medium text-primary hover:text-accent">
                                Continue Shopping
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @php
            session()->forget('transactionDetails');
        @endphp
    @endif
</x-app-layout>
