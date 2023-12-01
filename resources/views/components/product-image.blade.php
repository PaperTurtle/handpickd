<div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg">
    @foreach ($product->images as $image)
        <img src="{{ Storage::url($image->show_image_path) }}" alt="{{ $image->alt_text }}"
            class="h-full w-full object-cover object-center" loading="lazy">
    @endforeach
</div>
