<x-app-layout>
    <div class="container mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 lg:max-w-7xl lg:px-8" x-data="cart()"
        x-cloak>
        <h1 class="text-3xl font-bold tracking-tight text-text sm:text-4xl font-heading">Shopping Cart</h1>
        <div class="mt-12 lg:grid grid-cols-12 lg:gap-x-12 xl:gap-x-16">
            <!-- Shopping cart -->
            <section class="col-span-7">
                <template x-if="cartItems.length > 0">
                    <div class="cart-items divide-y divide-gray-200 border-b border-t border-gray-200">
                        <template x-for="cartItem in cartItems" :key="cartItem.id">
                            <div class="cart-item flex py-6 sm:py-10 relative">
                                <!-- Picture -->
                                <div class="flex-shrink-0">
                                    <img :src="{{ Storage::url('') }} + cartItem.product.images[0].thumbnail_image_path"
                                        alt=""
                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-48 sm:w-48">
                                </div>

                                <div class="ml-4 flex flex-1 flex-col justify-between sm:ml-6" x-data="{ modalOpen: false }">
                                    <div class="relative sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0 z-10">

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
                                            <div class="relative inline-block text-left w-16" x-data="{
                                                open: false,
                                                toggle() { this.open = !this.open },
                                                closeOnClickAway(event) { if (!this.$el.contains(event.target)) { this.open = false } }
                                            }"
                                                @click.away="closeOnClickAway">
                                                <!-- Button -->
                                                <button type="button"
                                                    class="inline-flex w-full justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                    @click="open = !open">
                                                    <div class="row-span-6" x-text="cartItem.quantity"></div>
                                                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <!-- items -->
                                                <ul class="absolute right-0 mt-2 w-16 max-h-52 overflow-y-auto bg-white shadow-lg ring-1 ring-black ring-opacity-5 z-50"
                                                    x-show="open" x-transition:enter="transition ease-out duration-100"
                                                    x-transition:enter-start="transform opacity-0 scale-95"
                                                    x-transition:enter-end="transform opacity-100 scale-100"
                                                    x-transition:leave="transition ease-in duration-75"
                                                    x-transition:leave-start="transform opacity-100 scale-100"
                                                    x-transition:leave-end="transform opacity-0 scale-95">
                                                    <template
                                                        x-for="i in Array.from({length: cartItem.product.quantity}, (_, i) => i + 1)">
                                                        <li class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                                            @click="`${toggle()}; ${updateCart(cartItem.id, i)}`">
                                                            <button class="text-center" x-text="i"></button>
                                                        </li>
                                                    </template>
                                                </ul>
                                            </div>
                                            <!-- Remove -->
                                            <div class="absolute right-0 top-0">
                                                <button type="button" @click="modalOpen = true"
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
                                    <!-- Confirm deletion modal -->
                                    <div x-show="modalOpen" class="z-50">
                                        <div class="bg-gray-400 fixed inset-0 opacity-40"></div>
                                        <div class="shadow-md p-4 max-w-sm h-40 m-auto rounded-md fixed inset-0"
                                            style="background-color: #f7f2e4;">

                                            <div class="flex">
                                                <svg class="mr-2 h-6 w-6 text-red-600" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                </svg>
                                                <P class="text-text font-bold">
                                                    Delete item
                                                </P>
                                                <button @click="modalOpen = false" class="h-5 w-5 ml-auto">
                                                    <svg class="text-gray-400" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <p class="text-text text-sm mt-3">
                                                Are you sure you want to delete the item from your shopping
                                                cart?
                                            </p>
                                            <div class="flex justify-end mt-5">
                                                <button
                                                    class="mr-4 py-1 px-2 bg-white border-gray-300 border-2 rounded-md"
                                                    @click="modalOpen = false">
                                                    <p class="text-text">
                                                        Cancel
                                                    </p>
                                                </button>
                                                <button
                                                    class="py-1 px-2 text-white bg-red-600 border-red-600 border-2 rounded-md"
                                                    @click="removeFromCart(cartItem.id), modalOpen = false">
                                                    <p class="">
                                                        Delete
                                                    </p>
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
            <section class="col-span-5 bg-light-grey h-fit rounded-lg px-4 py-6 sm:p-6 lg:p-8" x-cloak
                x-show="cartItem.length < 0">
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
                        <dt x-text="`Subtotal:`"></dt>
                        <dd class="font-medium" x-text="`${Number(calculateSubtotalPrice()).toFixed(2)} €`"></dd>
                    </div>
                </dl>
                <div class="pt-4 flex text-center">
                    <a class="bg-accent hover:bg-primary text-white font-bold py-2 px-4 rounded-lg min-w-full"
                        href="{{ route('checkout.process') }}">Checkout</a>
                </div>
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

                updateCart(itemId, newQuantity) {
                    fetch(`/cart/update/${itemId}`, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                quantity: newQuantity
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Update quantity in local cartItems array
                            let itemIndex = this.cartItems.findIndex(item => item.id === itemId);
                            if (itemIndex !== -1) {
                                this.cartItems[itemIndex].quantity = newQuantity;
                            }
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
