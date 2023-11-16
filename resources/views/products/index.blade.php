<x-app-layout>
    <div>
        <div class="mx-auto max-w-7xl overflow-hidden sm:px-6 lg:px-8 pt-10 pb-10">
            <h2 class="sr-only">Products</h2>

            <div class="-mx-px grid grid-cols-2 border-t border-l border-gray-300 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($products as $product)
                    <div class="group relative border-b border-r border-gray-300 p-4 sm:p-6">
                        <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-200 group-hover:opacity-75">
                            @if ($product->images->first())
                                <img src="{{ Storage::url($product->images->first()->resized_image_path) }}"
                                    alt="{{ $product->images->first()->alt_text }}"
                                    class="h-full w-full object-cover object-center">
                            @endif
                        </div>
                        <div class="pb-4 pt-10 text-center">
                            <h3 class="text-lg font-bold text-gray-900">
                                <a href="{{ route('products.show', $product->id) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="mt-4 text-base font-medium text-gray-900">
                                {{ number_format($product->price, 2) }} €
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
