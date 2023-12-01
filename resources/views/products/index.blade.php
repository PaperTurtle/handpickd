<x-app-layout>
    <section>
        <!-- Introduction Section -->
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <x-introduction />
            <!-- Search Bar Section -->
            <form action="{{ route('products.index') }}" method="GET">
                <x-searchbar />
                <!-- Filters Section -->
                <x-filter-section />
            </form>
            <!-- Product Grid Section -->
            <x-product-grid :products="$products" />
        </div>
    </section>
</x-app-layout>
