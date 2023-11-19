<x-app-layout>
    <section class="bg-white" x-data="dashboard()">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:pb-24">
            <div class="max-w-xl">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl font-heading">Your Dashboard</h1>
                <p class="mt-2 text-sm text-gray-500">Manage the status of recent orders and </p>
            </div>

            <div class="mt-16">
                <h2 class="sr-only">Recent orders</h2>

                <div class="space-y-20">
                    <div>
                        <table class="mt-4 w-full text-gray-500 sm:mt-6">
                            <caption class="sr-only">
                                Products
                            </caption>
                            <thead class="sr-only text-left text-sm text-gray-500 sm:not-sr-only">
                                <tr>
                                    <th scope="col" class="py-3 pr-8 font-normal sm:w-2/5 lg:w-1/3">Product</th>
                                    <th scope="col" class="hidden w-1/5 py-3 pr-8 font-normal sm:table-cell">Quantity
                                    </th>
                                    <th scope="col" class="hidden w-1/5 py-3 pr-8 font-normal sm:table-cell">Price
                                    </th>
                                    <th scope="col" class="hidden py-3 pr-8 font-normal sm:table-cell">Status</th>
                                    <th scope="col" class="w-0 py-3 text-right font-normal">Info</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 border-b border-gray-200 text-sm sm:border-t">
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td class="py-6 pr-8">
                                            <div class="flex items-center">
                                                <img src="{{ Storage::url($transaction->product->images->first()->thumbnail_image_path) }}"
                                                    alt="{{ $transaction->product->first()->alt_text }}"
                                                    class="mr-6 h-16 w-16 rounded object-cover object-center" />
                                                <div>
                                                    <div class="font-medium text-gray-900">
                                                        {{ $transaction->product->name }}
                                                    </div>
                                                    <div class="mt-1 sm:hidden">
                                                        {{ number_format($transaction->total_price, 2) }} €
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden py-6 pr-8 sm:table-cell">{{ $transaction->quantity }}</td>
                                        <td class="hidden py-6 pr-8 sm:table-cell">
                                            {{ number_format($transaction->total_price, 2) }} €</td>
                                        <td class="hidden py-6 pr-8 sm:table-cell">
                                            @if ($transaction->status !== 'sent')
                                                <button x-show="status[{{ $transaction->id }}] !== 'sent'"
                                                    x-on:click="markAsSent({{ $transaction->id }})"
                                                    class="appearance-none">Mark as Sent</button>
                                            @else
                                                <span x-text="status[{{ $transaction->id }}]"></span>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap py-6 text-right font-medium">
                                            <a href="{{ route('products.show', $transaction->product->id) }}"
                                                class="text-indigo-600">View<span class="hidden lg:inline">
                                                    Product</span><span class="sr-only">, Machined Pen and Pencil
                                                    Set</span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function dashboard() {
            return {
                status: @json($transactions->pluck('status', 'id')),
                markAsSent(transactionId) {
                    fetch(`/dashboard/transactions/${transactionId}/mark-as-sent`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
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
                }
            };
        }
    </script>
</x-app-layout>
