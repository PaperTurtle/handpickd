<x-app-layout>
    <div class="mx-auto max-w-2xl px-4 pt-16 w-fit">
        <label>
            <h1 class="text-3xl sm:text-4xl tracking-tight font-bold">Checkout</h1>
        </label>
        <div class="text-text lg:grid mt-10 pt-4 w-full border-t border-gray-200">
            <section class="w-full">
                <label class="text-xl">Contact information</label>
                <div class="mt-4 w-full">
                    <div class="lg:grid">
                        <label class="text-sm">Email address</label>
                        <input type="email" class="w-full h-8 text-sm rounded-md font-semibold shadow-sm  
                                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                    </div>
                    <div class="lg:grid mt-4">
                        <label class="text-sm">Phone number</label>
                        <input type="text" class="w-full h-8 text-sm rounded-md font-semibold shadow-sm  
                                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                    </div>
                </div>
            </section>
            <section class="lg:grid border-t border-b border-gray-200 mt-6 pt-4 mb-4 pb-6 text-sm">
                <label class="text-xl">Shipping information</label>
                <div class="flex mt-4">
                    <div class="lg:grid">
                        <label class="text-md">First name</label>
                        <input type="text" class="w-60 h-8 text-sm rounded-md font-semibold shadow-sm  
                                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                    </div>
                    <div class="lg:grid ml-4">
                        <label class="text-md">Last name</label>
                        <input type="text" class="w-60 h-8 text-sm rounded-md font-semibold shadow-sm  
                                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                    </div>
                </div>
                <label class="text-md mt-4">Address</label>
                <input type="text" class="w-full h-8 text-sm rounded-md font-semibold shadow-sm  
                                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                <label class="text-md mt-4">Apartment, suite, etc.</label>
                <input type="text" class="w-full h-8 text-sm rounded-md font-semibold shadow-sm  
                                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                <div class="flex mt-4">
                    <div class="lg:grid">
                        <label class="text-md">City</label>
                        <input type="text" class="w-60 h-8 text-sm rounded-md font-semibold shadow-sm  
                                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                    </div>
                    <div class="lg:grid ml-4">
                        <label class="text-md">Country</label>
                        <input type="text" class="w-60 h-8 text-sm rounded-md font-semibold shadow-sm  
                                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                    </div>
                </div>
                <div class="flex mt-4">
                    <div class="lg:grid">
                        <label class="text-md">State / Province</label>
                        <input type="text" class="w-60 h-8 text-sm rounded-md font-semibold shadow-sm 
                        ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                    focus:ring-2 focus:ring-accent focus:border-accent "></input>
                    </div>
                    <div class="lg:grid ml-4">
                        <label class="text-md">Postal code</label>
                        <input type="text" class="w-60 h-8 text-sm rounded-md font-semibold shadow-sm  
                                                    ring-inset ring-gray-300 border-gray-300 hover:bg-gray-50
                                                    focus:ring-2 focus:ring-accent focus:border-accent"></input>
                    </div>
                </div>
            </section>
        </div>
        <button type="submit" class="w-60 h-10 bg-white mt-4">Confirm order</button>
    </div>
</x-app-layout>