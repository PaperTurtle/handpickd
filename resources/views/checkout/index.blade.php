<x-app-layout>
    <div class="container mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 lg:max-w-7xl lg:px-8" x-data="cart()"
        x-cloak>
        <x-delete-item-notification />
        <h1 class="text-3xl font-bold tracking-tight text-text sm:text-4xl font-heading">Shopping Cart</h1>
        <div class="mt-12 lg:grid grid-cols-12 lg:gap-x-12 xl:gap-x-16">
            <!-- Shopping cart -->
            <section class="col-span-7">
                <template x-if="cartItems.length > 0">
                    <div class="cart-items divide-y divide-gray-200 border-b border-t border-gray-200">
                        <template x-for="cartItem in cartItems" :key="cartItem.id">
                            <div class="cart-item flex py-6 sm:py-10 relative" x-show="!cartItem.deleting"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <!-- Picture -->
                                <div class="flex-shrink-0">
                                    <img :src="{{ Storage::url('') }} + cartItem.product.images[0].thumbnail_image_path"
                                        alt="${cartItem.product.name}"
                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-48 sm:w-48">
                                </div>

                                <div class="ml-4 flex flex-1 flex-col justify-between sm:ml-6" x-data="{ modalOpen: false }">
                                    <div class="relative sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0 z-10">

                                        <div>
                                            <!-- name -->
                                            <h3 class="text-md">
                                                <a :href="`{{ route('products.show', '') }}/${cartItem.product.id}`"
                                                    class="font-medium text-text hover:text-gray-700 transition-all delay-[10ms] ease-in-out"
                                                    x-text="`${cartItem.product.name}`"></a>
                                            </h3>
                                            <!-- price -->
                                            <p class="mt-1 text-sm font-medium text-text pt-10"
                                                x-text="`${Number(cartItem.product.price).toFixed(2)} €`"></p>
                                        </div>

                                        <div>
                                            <!-- quantity dropdown-->
                                            <div class="relative inline-block text-left sm:w-16">
                                                <select x-model="cartItem.quantity"
                                                    @change="updateCart(cartItem.id, $event.target.value)"
                                                    class="max-w-full rounded-md border border-gray-300 py-1.5 text-left text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                                                    <template
                                                        x-for="i in Array.from({length: cartItem.product.quantity}, (_, i) => i + 1)"
                                                        :key="i">
                                                        <option :value="i"
                                                            x-bind:selected="i == cartItem.quantity" x-text="i">
                                                        </option>
                                                    </template>
                                                </select>
                                            </div>
                                            <!-- Remove -->
                                            <div class="absolute right-0 top-0">
                                                <button type="button"
                                                    @click="itemToDelete = cartItem.id; openDeleteModal = true"
                                                    class="-m-2 inline-flex p-2 text-gray-400 hover:text-gray-500 transition-all delay-[10ms] ease-in-out">
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
                                    <x-delete-item-modal />
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
            <section class="col-span-5 bg-light-grey h-fit rounded-lg px-4 py-6 sm:p-6 lg:p-8"
                x-show="cartItems.length > 0" x-transition:leave="transition ease-in duration-400"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <dl class="text-text text-sm">
                    <!-- heading text -->
                    <div class="flex items-baseline justify-between">
                        <dt x-text="`Order Summary`" class="text-xl"></dt>
                        <dd class="text-base" x-text="`Price`"></dd>
                    </div>
                    <!-- items summary -->
                    <div class="mt-6">
                        <template x-for="cartItem in cartItems" :key="cartItem.id">
                            <div class="flex items-center justify-between space-y-2" x-show="!cartItem.deleting"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
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
                    <a class="bg-primary hover:bg-accent text-white font-bold py-2 px-4 rounded-lg min-w-full transition-all delay-[20ms]"
                        href="{{ route('checkout.process') }}">Checkout</a>
                </div>
            </section>
        </div>
    </div>

    <script>
        function cart() {
            return {
                cartItems: @json($cartItems),
                openDeleteModal: false,
                showSuccessDeleteAlert: false,
                itemToDelete: null,
                removeFromCart(itemId) {
                    this.cartItems = this.cartItems.map(item => {
                        if (item.id === itemId) {
                            return {
                                ...item,
                                deleting: true
                            };
                        }
                        return item;
                    });
                    setTimeout(() => {
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
                                    Alpine.store('cart').count--;
                                    this.cartItems = this.cartItems.filter(item => item.id !== itemId);
                                    this.showSuccessDeleteAlert = true;
                                    setTimeout(() => this.showSuccessDeleteAlert = false, 5000);
                                })
                                .catch(error => {
                                    console.error('There has been a problem with your fetch operation:', error);
                                });
                        },
                        200);
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
                            let itemIndex = this.cartItems.findIndex(item => item.id === itemId);
                            if (itemIndex !== -1) {
                                this.cartItems[itemIndex].quantity = newQuantity;
                            }
                        })
                        .catch(error => {
                            console.error('There has been a problem with your update operation:', error);
                        });
                    this.itemToDelete = null;
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
