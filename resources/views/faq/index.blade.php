<x-app-layout>
    <div class="container" x-data="{ openGeneral: false, openForCustomers: false, openForArtisans: false }">
        <h2>FAQ / Support</h2>
        <h2>Frequently asked questions</h2>
        <div class="flex w-fit">
            <button class="border-2 rounded-md px-3 border-accent" @click="openGeneral = !openGeneral, openForCustomers = false, openForArtisans = false">General</button>
            <button class="border-2 rounded-md px-3 border-accent" @click="openForCustomers = !openForCustomers, openGeneral = false, openForArtisans = false">For our Customers</button>
            <button class="border-2 rounded-md px-3 border-accent"  @click="openForArtisans = !openForArtisans, openGeneral = false, openForCustomers = false">For our Artisans</button>
        </div>
        <div x-show="openGeneral">General questions</div>
        <div x-show="openForCustomers">Questions for customers</div>
        <div x-show="openForArtisans">Questions for artisans </div>
    </div>
</x-app-layout>
