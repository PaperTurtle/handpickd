<x-app-layout>
    <section x-data="dashboard()">
        <div class="py-16 sm:py-24">
            <div class="mx-auto max-w-7xl sm:px-2 lg:px-8">
                <div class="mx-auto max-w-2xl px-4 lg:max-w-4xl lg:px-0">
                    <h1 class="text-2xl font-bold tracking-tight text-text sm:text-3xl font-heading">Your Dashboard
                    </h1>
                    <p class="mt-2 text-sm text-gray-500">Manage the status of recent orders.</p>
                </div>
            </div>

            <div class="mt-16">
                <h2 class="sr-only">Recent orders</h2>
                <div class="mx-auto max-w-7xl sm:px-2 lg:px-8">
                    <div class="mx-auto max-w-2xl space-y-8 sm:px-4 lg:max-w-4xl lg:px-0">
                        @foreach ($transactions as $timestamp => $group)
                            @php
                                $date = new \DateTime($timestamp);
                                $orderNumber = $date->format('YmdHi');
                                $isOrderCompleted = collect($group)->every(fn($transaction) => $transaction->status === 'sent');
                            @endphp
                            <div class="border-b border-t border-gray-200 bg-white shadow-sm sm:rounded-lg sm:border">
                                <h3 class="sr-only">Order placed on <time
                                        datetime="2021-07-06">{{ $date->format('F j, Y') }}</time></h3>

                                <div
                                    class="flex items-center border-b border-gray-200 p-4 sm:grid sm:grid-cols-4 sm:gap-x-6 sm:p-6">
                                    <dl
                                        class="grid flex-1 grid-cols-2 gap-x-6 text-sm sm:col-span-3 sm:grid-cols-3 lg:col-span-2">
                                        <div>
                                            <dt class="font-medium text-text">Order number</dt>
                                            <dd class="mt-1 text-gray-500">{{ $orderNumber }}</dd>
                                        </div>
                                        <div class="hidden sm:block">
                                            <dt class="font-medium text-text">Date placed</dt>
                                            <dd class="mt-1 text-gray-500">
                                                <time datetime="2021-07-06">{{ $date->format('F j, Y') }}</time>
                                            </dd>
                                        </div>
                                        @php
                                            $totalAmount = $group->sum('total_price');
                                        @endphp
                                        <div>
                                            <dt class="font-medium text-text">Total amount</dt>
                                            <dd class="mt-1 font-medium text-text">
                                                {{ number_format($totalAmount, 2) }} €</dd>
                                        </div>
                                    </dl>
                                    <h3 x-cloak x-show="isOrderCompleted({{ json_encode($group->pluck('id')) }})"
                                        x-transition:enter="transition ease-out duration-500"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        class="inline-flex items-center text-green-500 font-bold">
                                        <span>Order Completed</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor" class="ml-2 w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </h3>
                                </div>

                                <!-- Products -->
                                <h4 class="sr-only">Items</h4>
                                <ul role="list" class="divide-y divide-gray-200">
                                    @foreach ($group as $transaction)
                                        <li class="p-4 sm:p-6">
                                            <div class="flex items-center sm:items-start">
                                                <div
                                                    class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg bg-gray-200 sm:h-40 sm:w-40">
                                                    <img src="{{ Storage::url($transaction->product->images->first()->thumbnail_image_path) }}"
                                                        alt="{{ $transaction->product->first()->alt_text }}"
                                                        class="h-full w-full object-cover object-center">
                                                </div>
                                                <div class="ml-6 flex-1 text-sm">
                                                    <div class="font-medium text-gray-900 sm:flex sm:justify-between">
                                                        <h5 class="text-base">{{ $transaction->product->name }}</h5>
                                                        <p class="mt-2 sm:mt-0">
                                                            {{ number_format($transaction->total_price, 2) }} €</p>
                                                    </div>
                                                    <p class="hidden text-gray-500 sm:mt-2 sm:block">
                                                        {{ $transaction->product->description }}</p>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="mt-6 sm:flex sm:justify-between">
                                                    <div x-cloak class="flex items-center"
                                                        x-show="status[{{ $transaction->id }}] !== 'sent'">
                                                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z"
                                                                clip-rule="evenodd" />
                                                        </svg>

                                                        <p class="ml-2 text-sm font-medium text-gray-500">Delivery
                                                            Pending
                                                        </p>
                                                    </div>
                                                    <div x-cloak class="flex items-center"
                                                        x-show="status[{{ $transaction->id }}] === 'sent'">
                                                        <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <p class="ml-2 text-sm font-medium text-gray-500">
                                                            Delivered on <time>{{ $transaction->delivered_on }}</time>
                                                        </p>
                                                    </div>

                                                    <div
                                                        class="mt-6 flex items-center space-x-4 divide-x divide-gray-200 border-t border-gray-200 pt-4 text-sm font-medium sm:ml-4 sm:mt-0 sm:border-none sm:pt-0">
                                                        <div class="flex flex-1 justify-center">
                                                            <a href="{{ route('products.show', $transaction->product->id) }}"
                                                                class="whitespace-nowrap text-indigo-600 hover:text-indigo-500">View
                                                                product</a>
                                                        </div>
                                                        <div class="flex flex-1 justify-center pl-4">
                                                            <button x-show="status[{{ $transaction->id }}] !== 'sent'"
                                                                x-on:click="markAsSent({{ $transaction->id }})"
                                                                class="appearance-none">Mark as Sent
                                                            </button>
                                                            <span x-show="status[{{ $transaction->id }}] === 'sent'"
                                                                x-text="status[{{ $transaction->id }}]">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function dashboard() {
            return {
                status: {},
                init() {
                    const transactionsData = @json($transactions);
                    Object.values(transactionsData).forEach(group => {
                        group.forEach(transaction => {
                            this.status[transaction.id] = transaction.status;
                        });
                    });
                },
                markAsSent(transactionId) {
                    fetch(`/dashboard/transactions/${transactionId}/mark-as-sent`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                '_method': 'PATCH',
                            }),
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok: ' + response.statusText);
                            }
                            return response.json();
                        })
                        .then(data => {
                            this.status[transactionId] = 'sent';
                        })
                        .catch(error => {
                            console.error('There has been a problem with your fetch operation:', error);
                        });
                },
                isOrderCompleted(transactionIds) {
                    return transactionIds.every(id => this.status[id] === 'sent');
                },
            };
        }
    </script>
</x-app-layout>
