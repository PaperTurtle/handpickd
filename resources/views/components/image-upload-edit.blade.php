<div class="w-1/4 md:w-1/2" x-data="{
    newImages: [],
    imageCount: {{ count($product->images) }},
    maxImageCount: 4,
    init() {
        this.resetFileInput();
    },
    resetFileInput() {
        this.$refs.images.value = '';
        this.newImages = [];
    },
    handleFileChange() {
        let selectedFiles = Array.from(this.$refs.images.files);
        let availableSlots = this.maxImageCount - this.imageCount;
        this.newImages = [];

        selectedFiles.slice(0, availableSlots).forEach(file => {
            let reader = new FileReader();
            reader.onload = (e) => { this.newImages.push(e.target.result); };
            reader.onerror = (e) => { console.error('FileReader error: ', e); };
            reader.readAsDataURL(file);
        });
    }
}" x-init="init">
    <label for="images" class="block text-base font-medium leading-6 text-gray-900">Add More Images (up to 4):</label>
    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10 bg-white">
        <div class="text-center">
            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                    clip-rule="evenodd" />
            </svg>
            <div class="mt-4 flex justify-center text-sm leading-6 text-gray-600">
                <label for="images"
                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span>Upload files</span>
                    <input id="images" name="images[]" type="file" multiple class="sr-only"
                        accept="image/png, image/jpeg, image/jpg, image/gif, image/svg+xml" x-ref="images"
                        @change="handleFileChange">
                </label>
            </div>
            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF and SVG</p>
        </div>
    </div>
    @error('images')
        <div class="text-sm text-red-600">{{ $message }}</div>
    @enderror
    @error('images.*')
        <div class="text-sm text-red-600">{{ $message }}</div>
    @enderror
    <div id="image-preview-container" x-show="newImages.length > 0" class="mt-4 flex space-x-4 flex-row justify-center">
        <template x-for="newImage in newImages" :key="newImage">
            <img :src="newImage" class="h-[15.928em] w-[15.928em] rounded-md object-cover"
                alt="New image preview" />
        </template>
    </div>
</div>
