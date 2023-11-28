<x-app-layout>
    <label>
        <h2 class="text-2xl">Checkout</h2>
    </label>
    <div class="text-text lg:grid">
        <section class="col-span-4">
            <label class="text-xl">Contact information</label>
            <div class="lg:grid">
                <label class="text-md">Email address</label>
                <input type="email" class="w-40 h-5"></input>
            </div>
            <div class="lg:grid">
                <label class="text-md">Phone number</label>
                <input type="text" class="w-40 h-5"></input>
            </div>
        </section>
        <section class="col-span-8 lg:grid">
            <label class="text-xl">Shipping information</label>
            <div class="flex">
                <div class="lg:grid">
                    <label class="text-md">First name</label>
                    <input type="text" class="w-40 h-5"></input>
                </div>
                <div class="lg:grid">
                    <label class="text-md">Last name</label>
                    <input type="text" class="w-40 h-5"></input>
                </div>
            </div>
            <label class="text-md">Address</label>
            <input type="text" class="w-40 h-5"></input>
            <label class="text-md">Apartment, suite, etc.</label>
            <input type="text" class="w-40 h-5"></input>
            <div class="flex">
                <div class="lg:grid">
                    <label class="text-md">City</label>
                    <input type="text" class="w-40 h-5"></input>
                </div>
                <div class="lg:grid">
                    <label class="text-md">Country</label>
                    <input type="text" class="w-40 h-5"></input>
                </div>
            </div>
            <div class="flex">
                <div class="lg:grid">
                    <label class="text-md">State / Province</label>
                    <input type="text" class="w-40 h-5"></input>
                </div>
                <div class="lg:grid">
                    <label class="text-md">Postal code</label>
                    <input type="text" class="w-40 h-5"></input>
                </div>
            </div>
        </section>
    </div>
    <button type="submit" class="w-40 h-10 bg-white">Confirm order</button>
</x-app-layout>