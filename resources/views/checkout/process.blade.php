<x-app-layout>
    <div class=" mx-auto max-w-2xl px-4 pt-16">
        <label>
            <h2 class="text-2xl">Checkout</h2>
        </label>
        <div class="text-text lg:grid">
            <section class="col-span-4 mt-4">
                <label class="text-xl">Contact information</label>
                <div class="mt-4">
                    <div class="lg:grid">
                        <label class="text-md">Email address</label>
                        <input type="email" class="w-40 h-5"></input>
                    </div>
                    <div class="lg:grid mt-4">
                        <label class="text-md">Phone number</label>
                        <input type="text" class="w-40 h-5"></input>
                    </div>
                </div>
            </section>
            <section class="col-span-8 lg:grid border-t border-gray-200 mt-6 pt-4">
                <label class="text-xl">Shipping information</label>
                <div class="flex mt-4">
                    <div class="lg:grid">
                        <label class="text-md">First name</label>
                        <input type="text" class="w-40 h-5"></input>
                    </div>
                    <div class="lg:grid ml-4">
                        <label class="text-md">Last name</label>
                        <input type="text" class="w-40 h-5"></input>
                    </div>
                </div>
                <label class="text-md mt-4">Address</label>
                <input type="text" class="w-40 h-5"></input>
                <label class="text-md mt-4">Apartment, suite, etc.</label>
                <input type="text" class="w-40 h-5"></input>
                <div class="flex mt-4">
                    <div class="lg:grid">
                        <label class="text-md">City</label>
                        <input type="text" class="w-40 h-5"></input>
                    </div>
                    <div class="lg:grid ml-4">
                        <label class="text-md">Country</label>
                        <input type="text" class="w-40 h-5"></input>
                    </div>
                </div>
                <div class="flex mt-4">
                    <div class="lg:grid">
                        <label class="text-md">State / Province</label>
                        <input type="text" class="w-40 h-5"></input>
                    </div>
                    <div class="lg:grid ml-4">
                        <label class="text-md">Postal code</label>
                        <input type="text" class="w-40 h-5"></input>
                    </div>
                </div>
            </section>
        </div>
        <button type="submit" class="w-40 h-10 bg-white mt-4">Confirm order</button>
    </div>
</x-app-layout>