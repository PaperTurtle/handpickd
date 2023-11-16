@php use App\Models\Category; @endphp
<x-app-layout>
    <div class="container mx-auto px-4 py-6" x-data="{
        newImages: [],
        imageCount: {{ count($product->images) }},
        maxImageCount: 3,
        removeImage(imageId) {
            if (!confirm('Are you sure you want to delete this image?')) return;
            fetch(`/products/{{ $product->id }}/images/` + imageId, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => {
                    if (!response.ok) throw response;
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        this.$refs['image' + imageId].remove();
                        this.imageCount--;
                    } else {
                        alert(data.message || 'Server error occurred.');
                    }
                })
                .catch(error => {
                    if (error instanceof Response) {
                        error.json().then(body => {
                            console.error('Error:', body);
                            alert(body.message || 'Could not delete the image.');
                        });
                    } else {
                        console.error('Error:', error);
                        alert('Could not delete the image.');
                    }
                });
        }
    }">
        <h1 class="text-xl font-semibold leading-7 text-gray-900">Edit {{ $product->name }}</h1>
        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data"
            class="mt-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name:</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" required
                    class="mt-1 block w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <!-- Category Field -->
            <div>
                <label for="category_id" class="block text-sm font-medium leading-6 text-gray-900">Category:</label>
                <select name="category_id" id="category_id" required
                    class="mt-1 block w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach (Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Description Field -->
            <div>
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description:</label>
                <textarea id="description" name="description" required
                    class="mt-1 block w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $product->description }}</textarea>
            </div>

            <!-- Price Field -->
            <div>
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price:</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01"
                    required
                    class="mt-1 block w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <!-- Existing Images Field -->
            <div>
                <label class="block text-sm font-medium leading-6 text-gray-900">Current Images:</label>
                <div class="flex space-x-4 mt-2">
                    @foreach ($product->images as $image)
                        <div x-ref="image{{ $image->id }}" class="relative">
                            <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->alt_text }}"
                                class="rounded-md h-24 object-cover">
                            <button type="button" @click="removeImage({{ $image->id }})"
                                class="absolute top-0 right-0 mt-1 mr-1 rounded-md bg-red-500 px-2 py-1 text-sm text-white">
                                Delete
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Images Field -->
            <div>
                <label for="images" class="block text-sm font-medium leading-6 text-gray-900">Add More Images (up to
                    3):</label>
                <div
                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10 w-1/3 bg-white">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                            <label for="images"
                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload files</span>
                                <input id="images" name="images[]" type="file" multiple class="sr-only"
                                    accept="image/png, image/jpeg, image/jpg, image/gif, image/svg+xml" x-ref="images"
                                    @change="newImages = [];
                                    let selectedFiles = Array.from($refs.images.files);
                                    if (selectedFiles.length + imageCount > maxImageCount) {
                                        $refs.images.value = '';
                                        alert(`You've reached the image upload limit`);
                                        return;
                                    }
                                    selectedFiles.forEach((file, index) => {
                                        if (index < maxImageCount - imageCount) {
                                            let reader = new FileReader();
                                            reader.onload = (e) => { newImages.push(e.target.result); };
                                            reader.onerror = (e) => { console.error('FileReader error: ', e); };
                                            reader.readAsDataURL(file);
                                        }
                                    });">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                @error('images')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                @error('images.*')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
                <div id="image-preview-container" x-show="newImages.length > 0" class="mt-4 flex space-x-4">
                    <template x-for="newImage in newImages" :key="newImage">
                        <img :src="newImage" class="h-[15.928em] w-[15.928em] rounded-md object-cover"
                            alt="New image preview">
                    </template>
                </div>
            </div>

            <button type="submit" class="rounded-md bg-primary px-4 py-2 text-lg text-white shadow-sm">Update
                Product
            </button>
        </form>
    </div>
</x-app-layout>
