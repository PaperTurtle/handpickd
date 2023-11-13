<x-app-layout>
    <div class="container">
        <h1 class="text-3xl font-bold my-4">{{ $product->name }}</h1>
        <p class="text-lg">{{ $product->description }}</p>
        <p class="text-xl font-semibold my-2">Price: ${{ number_format($product->price, 2) }}</p>

        <!-- Images Section -->
        <div class="grid grid-cols-2 gap-4 my-4">
            @foreach ($product->images as $image)
                <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->alt_text }}"
                    class="h-96 rounded-md shadow-lg" loading="lazy">
            @endforeach
        </div>

        @if (auth()->id() === $product->artisan_id)
            <a class="bg-secondary rounded-full py-1 px-4" href="{{ route('products.edit', $product->id) }}"
                class="btn btn-primary">Edit</a>
        @elseif ($product->quantity > 0)
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
        <div class="reviews mt-8">
            <h2 class="text-2xl font-semibold mb-3">Customer Reviews</h2>
            @forelse ($product->reviews as $review)
                <div class="review border-b border-gray-200 pb-4 mb-4">
                    <p class="text-sm text-gray-600">Rating: <span
                            class="font-semibold text-blue-600">{{ $review->rating }} / 5</span></p>
                    <p class="text-gray-800 my-2">{{ $review->review }}</p>
                    <p class="text-sm text-gray-500">Reviewed by: {{ $review->user->name }} on
                        {{ $review->created_at->format('F d, Y') }}</p>
                </div>
            @empty
                <p class="text-gray-600">No reviews yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
