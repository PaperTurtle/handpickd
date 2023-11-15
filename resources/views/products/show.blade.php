<x-app-layout>
    <div class="container" x-data="reviewForm()">
        <h1 class="text-3xl font-bold my-4">{{ $product->name }}</h1>
        <p class="text-lg">{{ $product->description }}</p>
        <p class="text-xl font-semibold my-2">Price: ${{ number_format($product->price, 2) }}</p>
        <p class="text-lg">
            Created by:
            @if (auth()->check() && auth()->id() === $product->artisan_id)
                <strong>You</strong>
            @else
                {{ $product->artisan->name }}
            @endif
        </p>
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
        <!-- Reviews Section -->
        <div class="reviews mt-8">
            <h2 class="text-2xl font-semibold mb-3">Customer Reviews</h2>
            <template x-for="review in reviews" :key="review.id">
                <div class="review border-b border-gray-200 pb-4 mb-4">
                    <p class="text-sm text-gray-600">Rating: <span class="font-semibold text-blue-600"
                            x-text="review.rating + ' / 5'"></span></p>
                    <p class="text-gray-800 my-2" x-text="review.review"></p>
                    <p class="text-sm text-gray-500">Reviewed by <span x-text="review.user.name"></span> on <span
                            x-text="formatDate(review.created_at)"></span></p>
                    <template x-if="review.user.id === {{ auth()->id() }}">
                        <button @click="beginEditReview(review)"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                            Edit Review
                        </button>
                    </template>
                </div>
            </template>
            <p x-show="reviews.length === 0" class="text-gray-600">No reviews yet.</p>
            <!-- Edit Review Form -->
            <template x-if="editingReview">
                <div class="edit-review mt-6 w-1/3">
                    <h2 class="text-2xl font-semibold mb-3">Edit Your Review</h2>
                    <form @submit.prevent="updateReview()">
                        @csrf
                        <div>
                            <label for="editRating" class="block text-sm font-medium text-gray-700">Rating</label>
                            <select id="editRating" x-model="editRating"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="editReviewText" class="block text-sm font-medium text-gray-700">Review</label>
                            <textarea id="editReviewText" x-model="editReviewText" rows="4"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>
                        <button type="submit"
                            class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Review
                        </button>
                    </form>
                </div>
            </template>
        </div>
        @if (auth()->check() && !$product->hasUserReviewed(auth()->id()) && auth()->id() !== $product->artisan_id)
            <template x-if="!userHasReviewed">
                <div @submit.prevent="submitReview" class="add-review mt-6 w-1/3">
                    <h2 class="text-2xl font-semibold mb-3">Write a Review</h2>
                    <form>
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div>
                            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                            <select id="rating" name="rating" x-model="rating"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ $i == 1 ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="review" class="block text-sm font-medium text-gray-700">Review</label>
                            <textarea id="review" name="review" rows="4" x-model="review"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>
                        <button type="submit"
                            class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Submit Review
                        </button>
                    </form>
                </div>
            </template>
        @endif
    </div>
    <script>
        function reviewForm() {
            return {
                productId: '{{ $product->id }}',
                rating: '1',
                review: '',
                reviews: @json($product->reviews->load('user')),
                userHasReviewed: {{ $product->hasUserReviewed(auth()->id()) ? 'true' : 'false' }},
                editingReview: false,
                editRating: 1,
                editReviewText: '',
                editReviewId: null,

                beginEditReview(review) {
                    this.editingReview = true;
                    this.editRating = review.rating;
                    this.editReviewText = review.review;
                    this.editReviewId = review.id;
                },

                formatDate(dateString) {
                    const options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
                    return new Date(dateString).toLocaleDateString(undefined, options);
                },

                submitReview() {
                    const payload = {
                        product_id: this.productId,
                        rating: parseInt(this.rating, 10),
                        review: this.review,
                        _token: '{{ csrf_token() }}'
                    };

                    fetch('{{ route('reviews.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify(payload)
                        })
                        .then(response => response.json())
                        .then(data => {
                            this.reviews.push(data);
                            this.userHasReviewed = true;
                            this.rating = '';
                            this.review = '';
                        })
                        .catch((error) => {
                            console.error('Error:', error);
                        });
                },

                updateReview() {
                    const payload = {
                        rating: parseInt(this.editRating, 10),
                        review: this.editReviewText,
                        _token: '{{ csrf_token() }}'
                    };

                    fetch('/reviews/' + this.editReviewId, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': payload._token,
                            },
                            body: JSON.stringify(payload)
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Find the review index using the review ID
                            const index = this.reviews.findIndex(review => review.id === this.editReviewId);

                            // If the review is found in the array
                            if (index !== -1) {
                                // Merge the updated review data with the existing user data
                                this.reviews[index] = {
                                    ...this.reviews[index],
                                    ...data,
                                    user: this.reviews[index].user
                                };

                                // Reset the form state
                                this.editingReview = false;
                                this.editReviewId = null;
                                this.editRating = '1';
                                this.editReviewText = '';
                            }
                        })
                        .catch((error) => {
                            console.error('Error:', error);
                        });
                },
            };
        }
    </script>
</x-app-layout>
