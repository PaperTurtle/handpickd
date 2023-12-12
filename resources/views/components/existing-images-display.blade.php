<div>
    <label class="block text-base font-medium leading-6 text-gray-900">Current Images:</label>
    <div class="flex space-x-4 mt-2">
        @foreach ($images as $image)
            <div x-ref="image{{ $image->id }}" class="relative">
                <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->alt_text }}"
                    class="h-[15.928em] w-[15.928em] rounded-md object-cover">
                <button type="button" @click="removeImage({{ $image->id }})"
                    class="absolute top-0 right-0 mt-1 mr-1 rounded-md bg-red-500 px-2 py-1 text-sm text-white">
                    Delete
                </button>
            </div>
        @endforeach
    </div>
</div>
