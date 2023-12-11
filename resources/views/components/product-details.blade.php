<div>
    <!-- Product Category -->
    <nav aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-2">
            <li>
                <div class="flex items-center text-sm">
                    <span class="font-medium text-gray-500 hover:text-text">{{ $product->category->name }}</span>
                </div>
            </li>
        </ol>
    </nav>
    <!-- Product Details -->
    <div class="mt-4">
        <h1 class="font-heading text-3xl font-bold tracking-tight text-text sm:text-4xl">
            {{ $product->name }}
        </h1>
        <h3 class="text-lg font-medium text-gray-700">Created by:
            @if (auth()->check() && auth()->id() === $product->artisan_id)
                <a href="{{ route('profile.show', $product->artisan->id) }}">
                    @if ($product->artisan->profile->profile_picture !== null)
                        <x-profile-image :product="$product" />
                    @else
                        <x-profile-initials :product="$product" />
                    @endif
                    <strong>You</strong>
                </a>
            @else
                <a href="{{ route('profile.show', $product->artisan->id) }}">
                    @if ($product->artisan->profile->profile_picture !== null)
                        <x-profile-image :product="$product" />
                    @else
                        <x-profile-initials :product="$product" />
                    @endif
                    {{ $product->artisan->name }}
                </a>
            @endif
        </h3>
    </div>
</div>
