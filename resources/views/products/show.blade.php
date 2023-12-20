<x-app-layout>
    <section x-data="reviewForm()">
        <!-- Notifications for product action -->
        <x-success-notification />
        <x-failure-notification />
        <!-- Notifications for review actions to cart-->
        <x-success-edit-notification />
        <x-success-write-notification />
        <x-success-delete-notification />
        <!-- Main Content  -->
        <div class="container" x-data="{ showModal: false }">
            <!-- Product Details Section -->
            <div
                class="mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 sm:pb-32 sm:pt-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:max-w-lg lg:self-end">
                    <x-product-details :product="$product"></x-product-details>
                    <!-- Product Information Section -->
                    <section aria-labelledby="information-heading" class="mt-4">
                        <h2 id="information-heading" class="sr-only">Product information</h2>

                        <div class="flex items-center">
                            <p class="text-lg text-text sm:text-xl">{{ number_format($product->price, 2) }}€</p>

                            <div class="ml-4 border-l border-gray-300 pl-4">
                                <h2 class="sr-only">Reviews</h2>
                                <div class="flex items-center">
                                    <div>
                                        <div class="flex items-center">
                                            <div class="flex items-center">
                                                <template x-for="i in 5" :key="i">
                                                    <svg class="h-5 w-5 flex-shrink-0"
                                                        :class="{
                                                            'text-yellow-400': i <= averageRating,
                                                            'text-gray-300': i >
                                                                averageRating
                                                        }"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </template>
                                            </div>
                                        </div>
                                        <p class="sr-only" x-text="`${Math.round(averageRating)} out of 5 stars`"></p>
                                    </div>
                                    <template x-if="totalReviews > 0 || totalReviews">
                                        <p class="ml-2 text-sm text-gray-500" x-text="`${totalReviews} reviews`">
                                        </p>
                                    </template>
                                    <template x-if="totalReviews === 0">
                                        <p class="ml-2 text-sm text-gray-500">No reviews yet.</p>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 space-y-6">
                            <p class="text-base text-gray-500">{{ $product->description }}</p>
                        </div>

                        <div class="mt-6 flex items-center">
                            @if ($product->quantity > 0)
                                <svg class="h-5 w-5 flex-shrink-0 text-green-500" viewBox="0 0 20 20" fill="green"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="ml-2 text-sm text-gray-500">In stock ({{ $product->quantity }}) and ready
                                    to
                                    ship
                                </p>
                                @if ($product->isInUserCart())
                                    <div class="tooltip-div" data-tooltip="You already have this item in your cart!">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="ml-1 w-4 h-4 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                        </svg>
                                    </div>
                                @endif
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="red" class="h-5 w-5 flex-shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <p class="ml-2 text-sm text-red-500">Out of Stock. Resuppling soon!</p>
                            @endif
                        </div>
                    </section>
                </div>
                <!-- Product Image Section -->
                <div class="mt-10 lg:col-start-2 lg:row-span-2 lg:mt-0 lg:self-center">
                    <div class="relative">
                        @if ($product->images->count() > 1)
                            <!-- Carousel with Tabs -->
                            <div x-data="{ selectedImage: 1 }" class="flex flex-col-reverse">
                                <!-- Image selector -->
                                <div class="mx-auto mt-6 w-full max-w-2xl sm:block lg:max-w-none">
                                    <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                                        @foreach ($product->images as $index => $image)
                                            <button @click="selectedImage = {{ $index + 1 }}"
                                                id="tabs-1-tab-{{ $index + 1 }}"
                                                class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4"
                                                aria-controls="tabs-1-panel-{{ $index + 1 }}" role="tab"
                                                type="button">
                                                <span class="sr-only">Image {{ $index + 1 }}</span>
                                                <span class="absolute inset-0 overflow-hidden rounded-md">
                                                    <img src="{{ Storage::url($image->show_image_path) }}"
                                                        alt="{{ $image->alt_text }}"
                                                        class="h-full w-full object-cover object-center">
                                                </span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="aspect-h-1 aspect-w-1 w-full">
                                    @foreach ($product->images as $index => $image)
                                        <div x-cloak x-show="selectedImage === {{ $index + 1 }}"
                                            id="tabs-1-panel-{{ $index + 1 }}" role="tabpanel" tabindex="0">
                                            <img src="{{ Storage::url($image->show_image_path) }}"
                                                alt="{{ $image->alt_text }}"
                                                class="h-full w-full object-cover object-center sm:rounded-lg">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg">
                                @foreach ($product->images as $image)
                                    <img src="{{ Storage::url($image->show_image_path) }}"
                                        alt="{{ $image->alt_text }}" class="h-full w-full object-cover object-center"
                                        loading="lazy">
                                @endforeach
                            </div>
                        @endif
                        @auth
                            @if (auth()->id() === $product->artisan_id)
                                <div class="absolute top-0 right-0">
                                    <button @click="showModal = true"
                                        class="inline-flex items-center gap-x-2 rounded-md bg-red-600 px-3.5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-red-500 focus-visible:outline font-body focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 z-50">
                                        Delete
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="-mr-0.5 h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                    <x-delete-modal :product="$product" />
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
                <!-- Product Form Section (Add to Cart) -->
                <x-add-to-cart-form :product="$product"></x-add-to-cart-form>
            </div>
        </div>
        <!-- Reviews Section -->
        <section aria-labelledby="reviews-heading" class="bg-background">
            <div
                class="mx-auto max-w-2xl px-4 py-24 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-12 lg:gap-x-8 lg:px-8 lg:py-32">
                <!-- Customer Reviews & Ratings -->
                <div class="lg:col-span-4">
                    <h2 id="reviews-heading" class="font-heading text-2xl font-bold tracking-tight text-text">
                        Customer Reviews
                    </h2>

                    <div class="mt-3 flex items-center">
                        <div>
                            <div class="flex items-center">
                                <template x-for="i in 5" :key="i">
                                    <svg class="h-5 w-5 flex-shrink-0"
                                        :class="{
                                            'text-yellow-400': i <= averageRating,
                                            'text-gray-300': i >
                                                averageRating
                                        }"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </template>
                            </div>
                            <p class="sr-only" x-text="`${Math.round(averageRating)} out of 5 stars`"></p>
                        </div>
                        <template x-if="totalReviews > 0">
                            <p class="ml-2 text-sm text-text" x-text="`Based on ${totalReviews} reviews`"></p>
                        </template>
                        <template x-if="totalReviews === 0">
                            <p class="ml-2 text-sm text-text">No reviews yet.</p>
                        </template>
                    </div>

                    <div class="mt-6" x-show="totalReviews > 0">
                        <h3 class="sr-only">Review data</h3>

                        <dl class="space-y-3">
                            <template
                                x-for="star in Object.keys(calculateStarRatingPercentages()).sort((a, b) => b - a)"
                                :key="star">
                                <div class="flex items-center text-sm">
                                    <dt class="flex flex-1 items-center">
                                        <p class="w-3 font-medium text-text" x-text="star"></p>
                                        <div aria-hidden="true" class="ml-1 flex flex-1 items-center">
                                            <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div class="relative ml-3 flex-1">
                                                <div class="h-3 rounded-full border border-gray-200 bg-gray-100"></div>
                                                <div :style="`width: ${calculateStarRatingPercentages()[star]}%`"
                                                    class="absolute inset-y-0 rounded-full border border-yellow-400 bg-yellow-400">
                                                </div>
                                            </div>
                                        </div>
                                    </dt>
                                    <dd class="ml-3 w-10 text-right text-sm tabular-nums text-text"
                                        x-text="`${Math.round(calculateStarRatingPercentages()[star])}%`"></dd>
                                </div>
                            </template>
                        </dl>
                    </div>
                    @if (auth()->check() && auth()->id() !== $product->artisan_id)
                        <template x-if="!userHasReviewed">
                            <div class="mt-10 add-review" @submit.prevent="submitReview">
                                <h3 class="text-lg font-medium text-text">Share your thoughts</h3>
                                <p class="mt-1 text-sm text-gray-600">If you’ve used this product, share your thoughts
                                    with
                                    other
                                    customers</p>

                                <button @click="writingReview = true"
                                    class="mt-6 inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white px-8 py-2 text-sm font-medium text-text hover:bg-gray-50 sm:w-auto lg:w-full transition-all delay-[15ms]">Write
                                    a review</button>
                            </div>
                        </template>
                    @endif
                </div>
                <!-- Recent Reviews Display Section -->
                <div class="mt-16 lg:col-span-7 lg:col-start-6 lg:mt-0 reviews" x-show="totalReviews > 0">
                    <h3 class="sr-only">Recent reviews</h3>

                    <div class="flow-root">
                        <div class="-my-12 divide-y divide-gray-400">
                            <template x-for="review in reviews" :key="review.id">
                                <div class="py-12">
                                    <div class="flex items-center">
                                        <template x-if="review.user.profile && review.user.profile.profile_picture">
                                            <img :src="getProfilePictureUrl(review.user.profile.profile_picture)"
                                                :alt="review.user.name" class="h-10 w-10 rounded-full flex-shrink-0">
                                        </template>
                                        <template x-if="!review.user.profile || !review.user.profile.profile_picture">
                                            <span
                                                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-secondary flex-shrink-0">
                                                <span class="font-medium leading-none text-black"
                                                    x-text="getUserInitials(review.user.name)"></span>
                                            </span>
                                        </template>
                                        <div class="ml-4">
                                            <a :href="`{{ route('profile.show', '') }}/${review.user.id}`">
                                                <h4 class="text-sm font-bold text-text" x-text="review.user.name">
                                                </h4>
                                            </a>
                                            <div class="mt-2 flex items-center">
                                                <template x-for="i in review.rating">
                                                    <svg class="text-yellow-400 h-5 w-5 flex-shrink-0"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </template>
                                                <template x-for="i in 5 - review.rating">
                                                    <svg class="text-gray-300 h-5 w-5 flex-shrink-0"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </template>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 space-y-6 text-base italic text-gray-600">
                                        <p x-text="review.review"></p>
                                    </div>
                                    <template x-if="review.updated_at == review.created_at">
                                        <p class="mt-2 text-sm text-gray-500">
                                            Reviewed on <span x-text="formatDate(review.created_at)"></span>
                                        </p>
                                    </template>
                                    <template x-if="review.updated_at != review.created_at">
                                        <p class="mt-1 text-sm text-gray-500">Updated on <span
                                                x-text="formatDate(review.updated_at)"></span></p>
                                    </template>
                                    @auth
                                        <template x-if="review.user.id === {{ auth()->id() }}">
                                            <div class="flex mt-4 flex-row gap-4">
                                                <button @click="beginEditReview(review)" type="button"
                                                    class="rounded-md bg-blue-600 hover:bg-blue-500 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary inline-flex gap-1">Edit
                                                    Review <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </button>
                                                <button @click="beginDeleteReview(review)"
                                                    class="rounded-md bg-red-600 hover:bg-red-500 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary inline-flex gap-1">
                                                    Delete Review <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>

                                                </button>
                                            </div>
                                        </template>
                                    @endauth
                                </div>
                            </template>
                            <p x-cloak x-show="reviews.length === 0" class="text-gray-600">No reviews yet.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Review Form Modal -->
            <x-edit-review-modal :product="$product" />
            <!-- Create Review Form Modal -->
            <x-create-review-modal :product="$product" />
            <!-- Delete Review Form Modal -->
            <x-delete-review-modal :product="$product" />
        </section>
    </section>
    <script>
        function reviewForm() {
            return {
                loading: false,
                openModal: false,
                productId: '{{ $product->id }}',
                rating: '1',
                review: '',
                reviews: @json($product->reviews->load('user.profile')),
                userHasReviewed: {{ auth()->check() && $product->hasUserReviewed(auth()->id()) ? 'true' : 'false' }},
                userProfilePicture: @json(auth()->check() ? auth()->user()->profile->profile_picture : null),
                writingReview: false,
                editingReview: false,
                deletingReview: false,
                showSuccessAlert: false,
                showFailureAlert: false,
                showSuccessWriteAlert: false,
                showSuccessEditAlert: false,
                showSuccessDeleteAlert: false,
                editRating: 1,
                editReviewText: '',
                editReviewId: null,
                deleteReviewId: null,
                averageRating: {{ $averageRating ?? 0 }},
                totalReviews: {{ $totalReviews ?? 0 }},

                init() {
                    this.updateReviewData();
                },
                calculateAverageRating() {
                    let totalRating = 0;
                    this.reviews.forEach(review => totalRating += review.rating);
                    this.averageRating = this.reviews.length > 0 ? totalRating / this.reviews.length : 0;
                },

                getUserInitials(name) {
                    const names = name.split(' ');
                    const initials = names.map(n => n[0]).join('');
                    return initials.toUpperCase();
                },

                getProfilePictureUrl(path) {
                    return '/storage/' + path;
                },

                calculateStarRatingPercentages() {
                    let starCounts = {
                        1: 0,
                        2: 0,
                        3: 0,
                        4: 0,
                        5: 0
                    };
                    this.reviews.forEach(review => {
                        starCounts[review.rating] = (starCounts[review.rating] || 0) + 1;
                    });

                    let percentages = {};
                    for (let star = 5; star >= 1; star--) {
                        percentages[star] = (starCounts[star] / this.totalReviews) * 100;
                    }
                    return percentages;
                },

                updateReviewData() {
                    this.calculateAverageRating();
                    this.totalReviews = this.reviews.length;
                },

                beginEditReview(review) {
                    this.editingReview = true;
                    this.editRating = review.rating;
                    this.editReviewText = review.review;
                    this.editReviewId = review.id;
                },

                beginDeleteReview(reviews) {
                    this.deletingReview = true;
                    this.deleteReviewId = reviews.id;
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
                        rating: this.rating,
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
                            data.user.profile = {
                                profile_picture: this.userProfilePicture
                            };
                            this.reviews.unshift(data);
                            this.updateReviewData();
                            this.userHasReviewed = true;
                            this.rating = '';
                            this.review = '';
                            this.writingReview = false;
                            this.openModal = false;
                            this.showSuccessWriteAlert = true;
                            setTimeout(() => this.showSuccessWriteAlert = false, 5000);
                        })
                        .catch((error) => {
                            console.error('Error:', error);
                        });
                },

                updateReview() {
                    const payload = {
                        rating: this.editRating,
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
                            const index = this.reviews.findIndex(review => review.id === this.editReviewId);

                            if (index !== -1) {
                                this.reviews[index] = {
                                    ...this.reviews[index],
                                    ...data,
                                    user: this.reviews[index].user
                                };
                                this.updateReviewData();
                                this.editingReview = false;
                                this.editReviewId = null;
                                this.editRating = '1';
                                this.editReviewText = '';
                                this.showSuccessEditAlert = true;
                                setTimeout(() => this.showSuccessEditAlert = false, 5000);
                            }
                        })
                        .catch((error) => {
                            console.error('Error:', error);
                        });
                },

                deleteReview() {
                    fetch('/reviews/' + this.deleteReviewId, {
                            method: 'DELETE',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            this.reviews = this.reviews.filter(review => review.id !== this.deleteReviewId);
                            this.updateReviewData();
                            this.userHasReviewed = false;
                            this.deletingReview = false;
                            this.showSuccessDeleteAlert = true;
                            setTimeout(() => this.showSuccessDeleteAlert = false, 5000);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                },

                addToCart(event) {
                    @auth
                    this.loading = true;
                    const formData = new FormData(event.target);
                    formData.append('quantity', '1');
                    fetch('{{ route('cart.add') }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                if (data.isNewItem) {
                                    Alpine.store('cart').count++;
                                }
                                this.loading = false;
                                this.showSuccessAlert = true;
                                setTimeout(() => this.showSuccessAlert = false, 5000);
                            } else {
                                this.loading = false;
                                this.showFailureAlert = true;
                                setTimeout(() => this.showFailureAlert = false, 5000);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                @endauth
                @guest
                window.location.href = "{{ route('login') }}";
            @endguest
        }
        };
        }
    </script>
</x-app-layout>
