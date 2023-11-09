<x-app-layout>
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p>Price: ${{ number_format($product->price, 2) }}</p>

        <!-- Images Section -->
        <div class="product-images">
            @foreach ($product->images as $image)
                <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->alt_text }}"
                    style="width: 200px; height: auto;">
            @endforeach
        </div>

        @if (auth()->id() === $product->artisan_id)
            <a class="bg-secondary rounded-full py-1 px-4" href="{{ route('products.edit', $product->id) }}"
                class="btn btn-primary">Edit</a>
        @elseif ($product->quantity > 0)
            <!-- If product is in stock, show add to cart form -->
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1" max="{{ $product->quantity }}"
                    class="rounded border-gray-300">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add to Cart
                </button>
            </form>
        @else
            <p class="text-red-500">Out of Stock</p>
        @endif
    </div>
</x-app-layout>
