<div x-cloak x-data="{ open: false, toggle() { this.open = !this.open }, closeOnClickAway(event) { if (!this.$el.contains(event.target)) { this.open = false } } }" @click.away="closeOnClickAway" class="relative inline-block text-left">
    <div>
        <button @click="toggle" type="button"
            class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-text" id="menu-button"
            aria-expanded="false" aria-haspopup="true">
            Sort
            <!-- SVG Icon here -->
        </button>
    </div>
    <div x-show="open" x-transition
        class="absolute left-0 z-10 mt-2 w-40 origin-top-left rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1" role="none">
            <!-- Sorting Links -->
            <a href="{{ route('products.index', ['sort' => 'rating']) }}"
                class="block px-4 py-2 text-sm font-medium text-text" role="menuitem" id="menu-item-1">Best Rating</a>
            <a href="{{ route('products.index', ['sort' => 'price_asc']) }}"
                class="block px-4 py-2 text-sm font-medium text-text" role="menuitem" id="menu-item-3">Price: Low to
                High</a>
            <a href="{{ route('products.index', ['sort' => 'price_desc']) }}"
                class="block px-4 py-2 text-sm font-medium text-text" role="menuitem" id="menu-item-4">Price: High to
                Low</a>
        </div>
    </div>
</div>
