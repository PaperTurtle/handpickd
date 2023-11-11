<x-app-layout>
    <div class="py-12" x-data="dashboard()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-secondary overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($transactions as $transaction)
                        <div class="mb-4 p-4 border-b-2 border-background">
                            <p>Product Name: {{ $transaction->product->name }}</p>
                            <p>Quantity Sold: {{ $transaction->quantity }}</p>
                            <p>Total Price: ${{ number_format($transaction->total_price, 2) }}</p>
                            <p>Status: <span x-text="status[{{ $transaction->id }}]"></span></p>
                            @if ($transaction->status !== 'sent')
                                <button x-show="status[{{ $transaction->id }}] !== 'sent'"
                                    x-on:click="markAsSent({{ $transaction->id }})"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Mark as Sent
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        function dashboard() {
            return {
                status: @json($transactions->pluck('status', 'id')),
                markAsSent(transactionId) {
                    fetch(`/dashboard/transactions/${transactionId}/mark-as-sent`, {
                            method: 'POST', // Laravel requires POST method with _method parameter to simulate PATCH
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
