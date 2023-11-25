<section aria-labelledby="products-heading" class="mt-8">
    <h2 id="products-heading" class="sr-only">Products</h2>
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
        @foreach ($products as $product)
            <x-product-card :product="$product"></x-product-card>
        @endforeach
    </div>
</section>
