<x-app-layout>
    <div class="container mx-auto max-w-2xl px-4 pt-16 lg:max-w-7xl lg:px-8 text-sm">
        <label>
            <h1 class="text-3xl sm:text-4xl tracking-tight font-bold">Checkout</h1>
        </label>
        <div class="flex lg:grid grid-cols-12 lg:gap-x-12 xl:gap-x-16">
            <section class="col-span-7 text-text lg:grid mt-10 pt-4 w-full border-t border-gray-200">
                <!-- Contact Information -->
                <section>
                    <label class="text-xl">Contact information</label>
                    <div class="mt-4">
                        <div class="lg:grid">
                            <label>Email address</label>
                            <input type="email"
                                class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                                                ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                                focus:ring-2 focus:ring-accent focus:border-accent"></input>
                        </div>
                        <div class="lg:grid mt-4">
                            <label class="">Phone number</label>
                            <input type="text"
                                class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                                                ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                                focus:ring-2 focus:ring-accent focus:border-accent"></input>
                        </div>
                    </div>
                </section>
                <!-- Shipping Information -->
                <section class="lg:grid border-t border-b border-gray-200 mt-6 pt-4 mb-4 pb-6 ">
                    <label class="text-xl">Shipping information</label>
                    <div class="flex mt-4 justify-between">
                        <div class="lg:grid flex-grow">
                            <label class="text-md">First name</label>
                            <input type="text" class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                        </div>
                        <div class="lg:grid ml-4 flex-grow">
                            <label class="text-md">Last name</label>
                            <input type="text"
                                class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                                            ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                            focus:ring-2 focus:ring-accent focus:border-accent"></input>
                        </div>
                    </div>
                    <label class="text-md mt-4">Address</label>
                    <input type="text"
                        class="w-full h-8 text-sm rounded-md font-semibold shadow-sm  
                                                            ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                            focus:ring-2 focus:ring-accent focus:border-accent"></input>
                    <label class="text-md mt-4">Apartment, suite, etc.</label>
                    <input type="text"
                        class="w-full h-8 text-sm rounded-md font-semibold shadow-sm  
                                                            ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                            focus:ring-2 focus:ring-accent focus:border-accent"></input>
                    <div class="flex mt-4 justify-between">
                        <div class="lg:grid flex-grow">
                            <label class="text-md">City</label>
                            <input type="text"
                                class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                                            ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                            focus:ring-2 focus:ring-accent focus:border-accent"></input>
                        </div>
                        <div class="lg:grid ml-4 flex-grow">
                            <label class="text-md">Country</label>
                            <input type="text"
                                class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                                            ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                            focus:ring-2 focus:ring-accent focus:border-accent"></input>
                        </div>
                    </div>
                    <div class="flex mt-4 justify-between">
                        <div class="lg:grid flex-grow">
                            <label class="text-md">State / Province</label>
                            <input type="text"
                                class="h-8 text-sm rounded-md font-semibold shadow-sm 
                                ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                            focus:ring-2 focus:ring-accent focus:border-accent "></input>
                        </div>
                        <div class="lg:grid ml-4 flex-grow">
                            <label class="text-md">Postal code</label>
                            <input type="text"
                                class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                                            ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                            focus:ring-2 focus:ring-accent focus:border-accent"></input>
                        </div>
                    </div>
                </section>
                <!-- Delivery Method -->
                <section x-data="{deliveryMethod: 'Standard'}">
                    <label class="text-xl">Delivery Method</label>
                    <fieldset class="flex justify-between">
                        <div class="flex-grow border bg-white ">
                            <input type="radio" value="Standard">
                            </input>
                            <div class="flex flex-col">
                                <div>Standard</div>
                                <div>4-10 business days</div>
                                <div>4.99 €</div>
                            </div>
                        </div>

                        <div class="ml-4 flex-grow border bg-white ">
                            <input type="radio" value="Express">
                            </input>
                            <div class="flex flex-col">
                                <div>Express</div>
                                <div>2-5 business days</div>
                                <div>14.99 €</div>
                            </div>
                        </div>
                    </fieldset>
                </section>
                <!-- Payment -->
                <section class="border-t border-b border-gray-200 mt-6 pt-4 mb-4 pb-6">
                    <label class="text-xl">Payment</label>
                    <div class="flex flex-col">
                        <div class="flex flex-col mt-4">
                            <label>Card number</label>
                            <input type="number" class="h-8 text-sm rounded-md font-semibold shadow-sm  
                            ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                            focus:ring-2 focus:ring-accent focus:border-accent"></input>
                        </div>
                        <div class="flex flex-col mt-4">
                            <label>Name on card</label>
                            <input type="text" class="h-8 text-sm rounded-md font-semibold shadow-sm  
                            ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                            focus:ring-2 focus:ring-accent focus:border-accent"></input>
                        </div>
                        <div class="flex justify-between mt-4">
                            <div class="flex flex-col w-3/5 mr-2">
                                <label>Expiration date (MM/YY)</label>
                                <input type="text" class="h-8 text-sm rounded-md font-semibold shadow-sm
                                ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50focus:ring-2
                                focus:ring-accent focus:border-accent"></input>
                            </div>
                            <div class="flex flex-col w-1/3">
                                <label>CVC</label>
                                <input type="text" class="h-8 text-sm rounded-md font-semibold shadow-sm  
                                ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                focus:ring-2 focus:ring-accent focus:border-accent"></input>
                            </div>
                        </div>

                    </div>
                </section>
            </section>
            <!-- Order Summary -->
            <section class="col-span-5 bg-light-grey h-fit rounded-lg px-4 py-6 sm:p-6 lg:p-8 mt-12" x-data="cart()"
                x-cloak>
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
                                    x-text="`${Number(cartItem.product.price * cartItem.quantity).toFixed(2)} €`"></dd>
                            </div>
                        </template>
                    </div>
                    <!-- subtotal -->
                    <div class="flex items-center justify-between mt-6">
                        <dt x-text="`Subotal:`"></dt>
                        <dd class="font-medium" x-text="`${Number(calculateSubtotalPrice()).toFixed(2)} €`"></dd>
                    </div>
                    <!-- shipping estimate -->
                    <div class="flex items-center justify-between border-t border-gray-200 mt-4 pt-4">
                        <dt x-text="`Shipping Estimate`"></dt>
                        <dd class="font-medium" x-text="`4.99 €`"></dd>
                    </div>
                    <!-- total price -->
                    <div class="flex items-center justify-between border-t border-gray-200 mt-4 pt-4 text-base">
                        <dt x-text="`Order Total:`"></dt>
                        <dd class="font-medium" x-text="`${calculateTotalPrice()} €`"></dd>
                    </div>
                </dl>
                <!-- checkout button -->
                <form class="pt-4" action="{{ route('checkout.process') }}" c-cloack x-show="cartItems.length > 0">
                    <button type="submit"
                        class="bg-accent text-base hover:bg-primary text-white font-bold py-2 px-4 rounded-lg min-w-full">
                        Confirm Order
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

            calculateSubtotalPrice() {
                let subTotalPrice = 0;
                this.cartItems.forEach(cartItem => {
                    subTotalPrice += cartItem.product.price * cartItem.quantity;
                });
                return Number(subTotalPrice).toFixed(2);
            },

            calculateTotalPrice() {
                let shippingEstimate = 4.99;
                let totalPrice = parseInt(this.calculateSubtotalPrice()) + shippingEstimate;
                return Number(totalPrice).toFixed(2);
            },
        }
    }
    </script>
</x-app-layout>