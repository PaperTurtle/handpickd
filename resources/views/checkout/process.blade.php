<x-app-layout>
    <div class="container mx-auto max-w-2xl px-4 pt-16 lg:max-w-7xl lg:px-8 text-sm" x-data="cart()">
        <label>
            <a href="{{ route('checkout.index') }}" class="text-sm font-medium text-primary hover:text-accent">
                <span aria-hidden="true"> &larr;</span>
                Return to cart
            </a>
            <h1 class="text-3xl sm:text-4xl tracking-tight font-bold font-heading">Checkout</h1>
        </label>
        <form class="pt-4" action="{{ route('checkout.process') }}" method="POST" x-cloak x-show="cartItems.length > 0">
            @csrf
            <div class="lg:grid grid-cols-12 lg:gap-x-12 xl:gap-x-16">
                <section class="col-span-7 text-text lg:grid mt-10 pt-4 w-full border-t border-gray-200">
                    <!-- Contact Information -->
                    <section>
                        <label class="text-xl">Contact information</label>
                        <div class="mt-4">
                            <div class="grid">
                                <label>Email address</label>
                                <input type="email" name="email" value={{ Auth::user()->email }}
                                    class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                            </div>
                            <div class="grid mt-4">
                                <label class="">Phone number</label>
                                <input type="text" name="phone_number"
                                    class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                            </div>
                        </div>
                    </section>
                    <!-- Shipping Information -->
                    @php
                        $fullName = $user->name;
                        $parts = explode(' ', $fullName);
                        $last_name = array_pop($parts);
                        $first_name = implode(' ', $parts);
                    @endphp
                    <section class="lg:grid border-t border-b border-gray-200 mt-6 pt-4 mb-4 pb-6 ">
                        <label class="text-xl">Shipping information</label>
                        <div class="flex mt-4 justify-between">
                            <div class="grid flex-grow">
                                <label class="text-md">First name</label>
                                <input type="text" name="first_name" value="{{ $first_name }}"
                                    class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                            </div>
                            <div class="grid ml-4 flex-grow">
                                <label class="text-md">Last name</label>
                                <input type="text" name="last_name" value="{{ $last_name }}"
                                    class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                            </div>
                        </div>
                        <label class="text-md mt-4">Address</label>
                        <input type="text" name="address"
                            class="w-full h-8 text-sm rounded-md font-semibold shadow-sm  
                                ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                focus:ring-2 focus:ring-accent focus:border-accent"></input>
                        <div class="flex mt-4 justify-between">
                            <div class="grid flex-grow">
                                <label class="text-md">City</label>
                                <input type="text" name="city"
                                    class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                        ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                        focus:ring-2 focus:ring-accent focus:border-accent"></input>
                            </div>
                            <div class="grid ml-4 flex-grow">
                                <label class="text-md">Country</label>
                                <input type="text" name="country"
                                    class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                        ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                        focus:ring-2 focus:ring-accent focus:border-accent"></input>
                            </div>
                        </div>
                        <div class="flex mt-4 justify-between">
                            <div class="grid flex-grow">
                                <label class="text-md">State / Province</label>
                                <input type="text" name="state_province"
                                    class="h-8 text-sm rounded-md font-semibold shadow-sm 
                                        ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                        focus:ring-2 focus:ring-accent focus:border-accent "></input>
                            </div>
                            <div class="grid ml-4 flex-grow">
                                <label class="text-md">Postal code</label>
                                <input type="text" name="postal_code"
                                    class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                        ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                        focus:ring-2 focus:ring-accent focus:border-accent"></input>
                            </div>
                        </div>
                    </section>
                    <!-- Delivery Method -->
                    <section x-cloak>
                        <fieldset class="flex justify-between mt-4">
                            <legend class="text-xl">Delivery Method</legend>
                            <label class="flex flex-1 justify-between cursor-pointer border-2 bg-white p-3 rounded-md"
                                :class="{ 'border-accent': deliveryMethod === 'Standard' }">
                                <input type="radio" name="delivery_method" value="Standard" x-model="deliveryMethod"
                                    class="sr-only" @change="calculateTotalPrice()">
                                <div class="flex flex-col">
                                    <div>Standard</div>
                                    <div>4-10 business days</div>
                                    <div>4.99 €</div>
                                </div>
                                <svg class="h-5 w-5 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    x-show="deliveryMethod ==='Standard'">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>

                            <label
                                class="flex flex-1 justify-between ml-4 cursor-pointer border-2 bg-white p-3 rounded-md"
                                :class="{ 'border-accent': deliveryMethod === 'Express' }">
                                <input type="radio" name="delivery_method" value="Express" x-model="deliveryMethod"
                                    class="sr-only" @change="calculateTotalPrice()">
                                <div class="flex flex-col">
                                    <div>Express</div>
                                    <div>2-5 business days</div>
                                    <div>12.99 €</div>
                                </div>
                                <svg class="h-5 w-5 text-accent" viewBox="0 0 20 20" fill="currentColor"
                                    x-show="deliveryMethod ==='Express'">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                        </fieldset>
                    </section>
                </section>
                <!-- Order Summary -->
                <section class="col-span-5 bg-light-grey h-fit rounded-lg px-4 py-6 sm:p-6 lg:p-8 mt-12" x-cloak>
                    <dl class="text-text">
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
                                        x-text="`${Number(cartItem.product.price * cartItem.quantity).toFixed(2)} €`">
                                    </dd>
                                </div>
                            </template>
                        </div>
                        <!-- subtotal -->
                        <div class="flex items-center justify-between border-t border-gray-200 mt-4 pt-4">
                            <dt x-text="`Subtotal:`"></dt>
                            <dd class="font-medium" x-text="`${Number(calculateSubtotalPrice()).toFixed(2)} €`"></dd>
                        </div>
                        <!-- shipping estimate -->
                        <div class="flex items-center justify-between border-t border-gray-200 mt-4 pt-4">
                            <dt x-text="`Shipping Estimate`"></dt>
                            <dd class="font-medium" x-text="`${calculateShippingEstimate()} €`"></dd>
                        </div>
                        <!-- total price -->
                        <div class="flex items-center justify-between border-t border-gray-200 mt-4 pt-4 text-base">
                            <dt x-text="`Order Total:`"></dt>
                            <dd class="font-medium" x-text="`${calculateTotalPrice()} €`"></dd>
                        </div>
                    </dl>
                    <!-- checkout button -->
                    <div class="pt-4">
                        <button type="submit"
                            class="bg-accent text-base hover:bg-primary text-white font-bold py-2 px-4 rounded-lg min-w-full">
                            Confirm Order
                        </button>
                    </div>
                </section>
            </div>
        </form>
    </div>
    <script>
        function cart() {
            return {
                cartItems: @json($cartItems),
                deliveryMethod: 'Standard',
                calculateSubtotalPrice() {
                    let subTotalPrice = 0;
                    this.cartItems.forEach(cartItem => {
                        subTotalPrice += cartItem.product.price * cartItem.quantity;
                    });
                    return Number(subTotalPrice).toFixed(2);
                },

                calculateTotalPrice() {
                    let shippingEstimate = this.calculateShippingEstimate();
                    let totalPrice = parseFloat(this.calculateSubtotalPrice()) + shippingEstimate;
                    return Number(totalPrice).toFixed(2);
                },

                calculateShippingEstimate() {
                    return this.deliveryMethod === "Standard" ? 4.99 : 12.99;
                },
            }
        }
    </script>
</x-app-layout>
