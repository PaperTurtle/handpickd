<div x-cloak x-data="{ open: false, toggle() { this.open = !this.open }, closeOnClickAway(event) { if (!this.$el.contains(event.target)) { this.open = false } } }" @click.away="closeOnClickAway" class="relative inline-block text-left">
    <div>
        <button @click="toggle" type="button"
            class="group inline-flex items-center justify-center text-sm font-medium text-gray-700 hover:text-text"
            aria-expanded="false">
            <span>Categories</span>
        </button>
    </div>
    <div x-show="open" x-transition
        class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white p-4 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
        <div class="space-y-4">
            @foreach (App\Models\Category::all() as $category)
                <div class="flex items-center">
                    <input id="{{ $category->name }}" name="categories[]" value="{{ $category->id }}" type="checkbox"
                        {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="{{ $category->name }}"
                        class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-text">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
