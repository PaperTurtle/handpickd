<x-app-layout>
    <section class="bg-white mx-auto max-w-3xl px-4 py-16 sm:px-6 sm:pb-32 sm:pt-24 lg:px-8" x-data="dashboard()">
        <div class="max-w-xl">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Your Orders</h1>
            <p class="mt-2 text-sm text-gray-500">Check the status of recent orders, manage returns, and discover similar
                products.</p>
        </div>

        <div class="mt-12 space-y-16 sm:mt-16">
            <!-- Loop through each order -->
            @foreach ($orders as $order)
                <section aria-labelledby="order-{{ $order->id }}-heading">
                    <div class="space-y-1 md:flex md:items-baseline md:space-x-4 md:space-y-0">
                        <h2 id="order-{{ $order->id }}-heading"
                            class="text-lg font-medium text-gray-900 md:flex-shrink-0">Order #{{ $order->order_uuid }}
                        </h2>
                        <div
                            class="space-y-5 sm:flex sm:items-baseline sm:justify-between sm:space-y-0 md:min-w-0 md:flex-1">
                            <p class="text-sm font-medium text-gray-500">
                                Delivered on {{ $order->created_at->format('F d, Y') }}
                            </p>
                            <div class="flex text-sm font-medium">
                                <!-- You can add manage order and view invoice links here -->
                            </div>
                        </div>
                    </div>

                    <div class="-mb-6 mt-6 flow-root divide-y divide-gray-200 border-t border-gray-200">
                        <!-- Loop through the transactions for each order -->
                        @foreach ($order->transactions as $transaction)
                            <div class="py-6 sm:flex">
                                <div class="flex space-x-4 sm:min-w-0 sm:flex-1 sm:space-x-6 lg:space-x-8">
                                    <img src="{{ Storage::url($transaction->product->images->first()->resized_image_path) }}"
                                        alt="{{ $transaction->product->name }}"
                                        class="h-20 w-20 flex-none rounded-md object-cover object-center sm:h-48 sm:w-48">
                                    <div class="min-w-0 flex-1 pt-1.5 sm:pt-0">
                                        <h3 class="text-sm font-medium text-gray-900">
                                            <a href="#">{{ $transaction->product->name }}</a>
                                        </h3>
                                        <p class="truncate text-sm text-gray-500">
                                            <span>{{ $transaction->product->category->name }}</span>
                                            <!-- Other product details -->
                                        </p>
                                        <p class="mt-1 font-medium text-gray-900">
                                            ${{ number_format($transaction->total_price, 2) }}</p>
                                    </div>
                                </div>
                                <div class="mt-6 space-y-4 sm:ml-6 sm:mt-0 sm:w-40 sm:flex-none">
                                    <button x-cloak x-show="status[{{ $transaction->id }}] !== 'sent'"
                                        x-on:click="markAsSent({{ $transaction->id }})" class="appearance-none">
                                        Mark as Sent
                                    </button>
                                    <span x-cloak x-text="status[{{ $transaction->id }}]"
                                        x-show="status[{{ $transaction->id }}] === 'sent'"></span>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach
        </div>
    </section>
    <script>
        function dashboard() {
            return {
                status: @json($orders->flatMap->transactions->pluck('status', 'id')),
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
                            console.log('Status updated:', this.status);
                        })
                        .catch(error => {
                            console.error('There has been a problem with your fetch operation:', error);
                        });
                }
            };
        }
    </script>
</x-app-layout>
