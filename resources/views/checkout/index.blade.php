<x-app-layout>
    <div class="container mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 lg:max-w-7xl lg:px-8" x-data="cart()">
        <h1 class="text-3xl font-bold">Shopping Cart</h1>
        <div class="mt-12 lg:grid grid-cols-12 lg:gap-x-12 xl:gap-x-16">
            <section class="col-span-7">
                <div>
                    <h2 id="cart-heading" x-text="`Items in your shopping cart`"></h2>
                </div>
                <template x-if="cartItems.length > 0">
                    <div class="cart-items divide-y divide-gray-200 border-b border-t border-gray-200">
                        <template x-for="cartItem in cartItems" :key="cartItem.id">
                            <div class="cart-item flex">
                                <!-- picture -->
                                <div class="flex-shrink-0">
                                    <img src="" alt=""
                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-48 sm:w-48">
                                </div>

                                <div class="flex flex-1 flex-col justify-between">
                                    <div class="relative sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                        <div>
                                            <div class="flex-col justify-between">
                                                <!-- name -->
                                                <p x-text="`${cartItem.product.name}`"></p>
                                                <!-- price -->
                                                <p x-text="`$${Number(cartItem.product.price).toFixed(2)} €`"></p>
                                            </div>
                                        </div>
                                        <div>
                                            <!-- quantity -->
                                            <p>
                                                <label for="quantity">Quantity:</label>
                                                <input type="number" id="quantity" x-model="cartItem.quantity" min="1"
                                                    :max="cartItem.product.quantity"
                                                    @change="updateCart(cartItem.id, cartItem.quantity)">
                                            </p>
                                            <!-- remove -->
                                            <div class="absolute right-0 top-0">
                                                <button type="button" @click="removeFromCart(cartItem.id)"
                                                    class="-m-2 inline-flex p-2 text-gray-400 hover:text-gray-500">
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path
                                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- in stock / not in stock -->
                                    <template x-if="cartItem.product.quantity <= 0">
                                        <p>Ships in 3-4 weeks</p>
                                    </template>
                                    <template x-if="cartItem.product.quantity > 0">
                                        <p>In stock</p>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>

                <template x-cloak x-if="cartItems.length === 0">
                    <p>Your shopping cart is empty.</p>
                </template>
            </section>

            <section class="col-span-5">
                <dl>
                    <div class="flex items-center justify-between">
                        <dt x-text="`Order Summary`"></dt>
                        <dd x-text="`Price`"></dd>
                    </div>
                    <template x-for="cartItem in cartItems" :key="cartItem.id">
                        <div class="flex items-center justify-between">
                            <dt x-text="`${cartItem.product.name}`"></dt>
                            <dd x-text="`${Number(cartItem.product.price * cartItem.quantity).toFixed(2)} €`"></dd>
                        </div>
                    </template>

                    <div class="flex items-center justify-between">
                        <dt x-text="`Total Price:`"></dt>
                        <dd x-text="`$${calculateTotalPrice()}`"></dd>
                    </div>
                </dl>

                <a href="{{ route('checkout.process') }}">proceed to checkout</a>
                <form action="{{ route('checkout.process') }}" method="POST" x-show="cartItems.length > 0" x-cloak>
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