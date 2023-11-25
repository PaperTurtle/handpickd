<x-app-layout>
    <div class="container" x-data="cart()">
        <h1 class="text-3xl font-bold">Shopping Cart</h1>
        <div class="mt-12 lg:grid grid-cols-12 lg:gap-x-12 xl:gap-x-16">
            <section class="col-span-7">
                <div>
                    <h2 id="cart-heading" x-text="`Items in your shopping cart`"></h2>
                </div>
                <template x-if="cartItems.length > 0">
                    <div class="cart-items divide-y divide-gray-200 border-b border-t border-gray-200">
                        <template x-for="cartItem in cartItems" :key="cartItem.id">
                            <div class="cart-item">
                                <p x-text="`Product Name: ${cartItem.product.name}`"></p>
                                <p>
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="quantity" x-model="cartItem.quantity" min="1"
                                        :max="cartItem.product.quantity"
                                        @change="updateCart(cartItem.id, cartItem.quantity)">
                                </p>
                                <p x-text="`Price: $${Number(cartItem.product.price).toFixed(2)}`"></p>
                                <p
                                    x-text="`Total Price: $${(Number(cartItem.product.price) * cartItem.quantity).toFixed(2)}`">
                                </p>
                                <template x-if="cartItem.product.quantity <= 0">
                                    <p>Ships in 3-4 weeks</p>
                                </template>
                                <template x-if="cartItem.product.quantity > 0">
                                    <p>In stock</p>
                                </template>
                                <button type="button" @click="removeFromCart(cartItem.id)"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Remove
                                </button>
                            </div>
                        </template>
                    </div>
                </template>

                <template x-cloak x-if="cartItems.length === 0">
                    <p>Your shopping cart is empty.</p>
                </template>
            </section>

            <section class="col-span-5">
                <p>Order Summary</p>
                <template x-for="cartItem in cartItems" :key="cartItem.id">
                    <div>
                        <h3 x-text="`${cartItem.product.name}`"></h3>
                        <p x-text="`${cartItem.product.price} €`"></p>
                    </div>
                </template>
                <p x-text="`Total Price: $${calculateTotalPrice()} €`"></p>

                <a href="{{ route('checkout.process') }}">proceed to checkout</a>
                <form action="{{ route('checkout.process') }}" method="POST" x-show="cartItems.length > 0" x-cloak>
                    @csrf
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Complete Purchase
                    </button>
                </form>
            </section>
        </div>
    </div>

    <script>
    function cart() {
        return {
            cartItems: @json($cartItems),

            removeFromCart(itemId) {
                fetch(`/cart/${itemId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        this.cartItems = this.cartItems.filter(item => item.id !== itemId);
                    })
                    .catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                    });
            },

            updateCart(itemId, quantity) {
                fetch(`/cart/update/${itemId}`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            quantity: quantity
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .catch(error => {
                        console.error('There has been a problem with your update operation:', error);
                    });
            },

            calculateTotalPrice() {
                let totalPrice = 0;
                this.cartItems.forEach(cartItem => {
                    totalPrice += cartItem.product.price * cartItem.quantity;
                });
                return Number(totalPrice).toFixed(2);
            },
        }
    };
    </script>
</x-app-layout>