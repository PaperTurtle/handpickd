<x-app-layout>
    <div>
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Products</h2>

            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)
                    <a href="{{ route('products.show', $product->id) }}" class="group bg-secondary p-2 rounded-lg">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg xl:aspect-h-8 xl:aspect-w-7">
                            @if ($product->images->first())
                                <img src="{{ Storage::url($product->images->first()->resized_image_path) }}"
                                    alt="{{ $product->images->first()->alt_text }}"
                                    class="h-[9em] w-full object-cover object-center group-hover:opacity-75"
                                    loading="lazy" height="144" width="240">
                            @endif
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">{{ $product->name }}</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">${{ number_format($product->price, 2) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
