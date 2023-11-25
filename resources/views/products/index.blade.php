<x-app-layout>
    <section>
        <!-- Introduction Section -->
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="py-24 text-center">
                <h1 class="text-4xl font-bold tracking-tight text-text font-heading">Discover Artisanal Wonders</h1>
                <p class="mx-auto mt-4 max-w-3xl text-base text-gray-500">Explore a curated selection of handcrafted
                    treasures, each piece telling a unique story of skill and creativity, perfect for enhancing your
                    living space and lifestyle..</p>
            </div>
            <!-- Search Bar Section -->
            <form action="{{ route('products.index') }}" method="GET">
                <div class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl 2xl:max-w-2xl mx-auto my-6">
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                        <input
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-full leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Search products" name="search" type="search" value="{{ request('search') }}">
                    </div>
                </div>
                <!-- Filters Section -->
                <section aria-labelledby="filter-heading" class="border-t border-gray-200 pt-6">
                    <h2 id="filter-heading" class="sr-only">Product filters</h2>
                    <!-- Filter Options -->
                    <div class="flex items-center justify-between">
                        <div x-cloak x-data="{ open: false, toggle() { this.open = !this.open }, closeOnClickAway(event) { if (!this.$el.contains(event.target)) { this.open = false } } }" @click.away="closeOnClickAway"
                            class="relative inline-block text-left">
                            <div>
                                <button @click="open = !open" type="button"
                                    class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-text"
                                    id="menu-button" aria-expanded="false" aria-haspopup="true">
                                    Sort
                                    <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute left-0 z-10 mt-2 w-40 origin-top-left rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="#" class="block px-4 py-2 text-sm font-medium text-text"
                                        role="menuitem" tabindex="-1" id="menu-item-1">Best Rating</a>
                                    <a href="#" class="block px-4 py-2 text-sm font-medium text-text"
                                        role="menuitem" tabindex="-1" id="menu-item-3">Price: Low to High</a>
                                    <a href="#" class="block px-4 py-2 text-sm font-medium text-text"
                                        role="menuitem" tabindex="-1" id="menu-item-4">Price: High to Low</a>
                                </div>
                            </div>
                        </div>
                        <!-- Category Filters -->
                        <div class="flex items-baseline space-x-8">
                            <div x-cloak x-data="{ open: false, toggle() { this.open = !this.open }, closeOnClickAway(event) { if (!this.$el.contains(event.target)) { this.open = false } } }" @click.away="closeOnClickAway"
                                class="relative inline-block text-left">
                                <div>
                                    <button @click="open = !open" type="button"
                                        class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-text"
                                        aria-expanded="false">
                                        <span>Categories</span>
                                    </button>
                                </div>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div class="space-y-4">
                                        @foreach (App\Models\Category::all() as $category)
                                            <div class="flex items-center">
                                                <input id="{{ $category->name }}" name="categories[]"
                                                    value="{{ $category->id }}" type="checkbox"
                                                    {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="{{ $category->name }}"
                                                    class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-text">{{ $category->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            <!-- Product Grid Section -->
            <section aria-labelledby="products-heading" class="mt-8">
                <h2 id="products-heading" class="sr-only">Products</h2>
                <!-- Products Grid -->
                <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                    <!-- Product Cards -->
                    @foreach ($products as $product)
                        <a href="{{ route('products.show', $product->id) }}" class="group"
                            data-category="{{ $product->category->name }}">
                            <div
                                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg sm:aspect-h-3 sm:aspect-w-2">
                                @if ($product->images->first())
                                    <img src="{{ Storage::url($product->images->first()->resized_image_path) }}"
                                        alt="{{ $product->images->first()->alt_text }}"
                                        class="h-full w-full object-cover object-center group-hover:opacity-75" />
                                @endif
                            </div>
                            <div class="mt-4 flex items-center justify-between text-base font-medium text-text">
                                <h3 class="font-heading font-bold">{{ $product->name }}</h3>
                                <p>{{ number_format($product->price, 2) }} €</p>
                            </div>
                            <div class="flex items-center mt-2">
                                @foreach (range(1, 5) as $star)
                                    <svg class="h-5 w-5 flex-shrink-0 {{ $product->averageRating() >= $star ? 'text-yellow-400' : 'text-gray-300' }}"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endforeach
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
    </section>
</x-app-layout>
