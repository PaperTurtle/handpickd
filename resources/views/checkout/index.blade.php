<x-app-layout>
    <div class="container mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 lg:max-w-7xl lg:px-8" x-data="cart()" x-cloak>
        <h1 class="text-3xl font-bold tracking-tight text-text sm:text-4xl">Shopping Cart</h1>
        <div class="mt-12 lg:grid grid-cols-12 lg:gap-x-12 xl:gap-x-16">
            <!-- shopping cart -->
            <section class="col-span-7">
                <template x-if="cartItems.length > 0">
                    <div class="cart-items divide-y divide-gray-200 border-b border-t border-gray-200">
                        <template x-for="cartItem in cartItems" :key="cartItem.id">
                            <div class="cart-item flex py-6 sm:py-10">
                                <!-- picture -->
                                <div class="flex-shrink-0">
                                    <img src="" alt=""
                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-48 sm:w-48">
                                </div>

                                <div class="ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                                    <div class="relative sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">

                                        <div>
                                            <!-- name -->
                                            <h3 class="text-sm">
                                                <a href="#" class="font-medium text-text hover:text-gray-400"
                                                    x-text="`${cartItem.product.name}`"></a>
                                            </h3>
                                            <!-- price -->
                                            <p class="mt-1 text-sm font-medium text-text pt-10"
                                                x-text="`${Number(cartItem.product.price).toFixed(2)} €`"></p>
                                        </div>

                                        <div>
                                            <!-- quantity dropdown-->
                                            <div class="relative inline-block text-left w-16"
                                                x-data="{ open: false, toggle() { this.open = !this.open },
                                            closeOnClickAway(event) { if (!this.$el.contains(event.target)) { this.open = false } } }"
                                                @click.away="closeOnClickAway">

                                                <!-- Button -->
                                                <button type="button" class="inline-flex w-full justify-center bg-white gap-x-1.5 rounded-md 
                                                    py-2 text-sm text-text font-semibold shadow-sm ring-1 
                                                    ring-inset ring-gray-300 hover:bg-gray-50
                                                     focus:ring-2 focus:ring-accent" @click="open = !open">
                                                    <div class="row-span-6" x-text="cartItem.quantity"></div>
                                                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <!-- items -->
                                                <ul class="py-1 absolute right-0 z-10 mt-2 w-16 h-fit max-h-80 overflow-scroll overflow-x-hidden
                                                    origin-top-right bg-white shadow-lg ring-1 ring-black ring-opacity-5"
                                                    x-show="open" x-transition:enter="transition ease-out duration-100"
                                                    x-transition:enter-start="transform opacity-0 scale-95"
                                                    x-transition:enter-end="transform opacity-100 scale-100"
                                                    x-transition:leave="transition ease-in duration-75"
                                                    x-transition:leave-start="transform opacity-100 scale-100"
                                                    x-transition:leave-end="transform opacity-0 scale-95">
                                                    <template x-for="i in cartItem.product.quantity">
                                                        <li class="text-text block px-4 py-2 text-sm 
                                                        hover:bg-accent hover:text-white hover:duration-200 rounded-md"
                                                            @click="`${toggle()}; ${updateCart(cartItem.id, i)}`">
                                                            <button class="text-center" x-text="`${i}`"></button>
                                                        </li>
                                                    </template>
                                                </ul>
                                            </div>
                                            <!-- old quantity -->
                                            <!-- <p>
                                                        <label for="quantity">Quantity:</label>
                                                        <input type="number" id="quantity" x-model="cartItem.quantity"
                                                            min="1" :max="cartItem.product.quantity"
                                                            @change="updateCart(cartItem.id, cartItem.quantity)">
                                                    </p> -->
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

                                    <!-- in stock -->
                                    <template x-if="cartItem.product.quantity > 0">
                                        <div class="space-x-2 flex text-sm text-text">
                                            <svg class="h-5 w-5 flex-shrink-0 text-accent " viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <p x-text="`In stock`"></p>
                                        </div>
                                        <!-- not in stock -->
                                        <template x-if="cartItem.product.quantity <= 0">
                                            <div class="space-x-2 flex text-sm text-text">
                                                <svg class="h-5 w-5 flex-shrink-0 text-gray-300" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <p x-text="`Ships in 3-4 weeks`"></p>
                                            </div>
                                        </template>
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
            <!-- Order Summary -->
            <section class="col-span-5 bg-light-grey h-fit rounded-lg px-4 py-6 sm:p-6 lg:p-8">
                <dl class="text-text text-sm">
                    <!-- heading text -->
                    <div class="flex items-baseline justify-between">
                        <dt x-text="`Order Summary`" class="text-xl"></dt>
                        <dd class="text-base" x-text="`Price`"></dd>
                    </div>
                    <!-- items summary -->
                    <div class="mt-6">
                        <template x-for="cartItem in cartItems" :key="cartItem.id">
                            <div class="flex items-center justify-between space-y-2">
                                <dt x-text="`${cartItem.product.name}`"></dt>
                                <dd class="font-medium"
                                    x-text="`${Number(cartItem.product.price * cartItem.quantity).toFixed(2)} €`"></dd>
                            </div>
                        </template>
                    </div>
                    <!-- subtotal -->
                    <div class="flex items-center justify-between border-t border-gray-200 mt-4 pt-4 text-base">
                        <dt x-text="`Subotal:`"></dt>
                        <dd class="font-medium" x-text="`${Number(calculateSubtotalPrice()).toFixed(2)} €`"></dd>
                    </div>
                </dl>
                <!-- checkout button -->
                <form class="pt-4" action="{{ route('checkout.process') }}" c-cloack x-show="cartItems.length > 0">
                    <button type="submit"
                        class="bg-accent hover:bg-primary text-white font-bold py-2 px-4 rounded-lg min-w-full">
                        Checkout
                    </button>
                </form>
                <!-- <a href="{{ route('checkout.process') }}">proceed to checkout</a>
                <form action="{{ route('checkout.process') }}" method="POST" x-show="cartItems.length > 0" x-cloak>
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Complete Purchase
                    </button>
                </form> -->
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

            calculateSubtotalPrice() {
                let subTotalPrice = 0;
                this.cartItems.forEach(cartItem => {
                    subTotalPrice += cartItem.product.price * cartItem.quantity;
                });
                return Number(subTotalPrice).toFixed(2);
            },
        }
    };
    </script>
</x-app-layout>