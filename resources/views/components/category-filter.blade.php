<div x-cloak x-data="{ open: false, toggle() { this.open = !this.open }, closeOnClickAway(event) { if (!this.$el.contains(event.target)) { this.open = false } } }" @click.away="closeOnClickAway" class="relative inline-block text-left">
    <div>
        <button @click="toggle" type="button"
            class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-text gap-1"
            aria-expanded="false">
            <span>Categories
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
            </svg>
        </button>
    </div>
    <div x-show="open" x-transition
        class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
        <div class="space-y-4">
            @foreach (App\Models\Category::all() as $category)
                <div class="flex items-center">
                    <input id="{{ $category->name }}" name="categories[]" value="{{ $category->id }}" type="checkbox"
                        {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 transition-all delay-[10ms]">
                    <label for="{{ $category->name }}"
                        class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-text">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>
        <hr class="mt-2 mb-2">
        <div class="flex justify-center">
            <button class="flex flex-row gap-2 text-center hover:text-gray-700 transition-all delay-[10ms]"
                type="submit">Filter <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
            </button>
        </div>
    </div>
</div>
