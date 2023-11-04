<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="container" x-data="{
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
        <h1>Edit {{ $product->name }}</h1>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" required>
            </div>

            <!-- Category Field -->
            <div>
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Description Field -->
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required>{{ $product->description }}</textarea>
            </div>

            <!-- Price Field -->
            <div>
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01"
                    required>
            </div>
            <!-- Existing Images Field -->
            <div>
                <label>Current Images:</label>
                <div>
                    @foreach ($product->images as $image)
                        <div x-ref="image{{ $image->id }}">
                            <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->alt_text }}"
                                style="width: 100px; height: auto;">
                            <button type="button" @click="removeImage({{ $image->id }})">Delete</button>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Images Field -->
            <div>
                <label for="images">Add More Images (up to 3):</label>
                <input type="file" id="images" name="images[]" multiple x-ref="images"
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
                @error('images')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('images.*')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div id="image-preview-container" x-show="newImages.length > 0">
                    <template x-for="newImage in newImages" :key="newImage">
                        <img :src="newImage" style="height: 100px; margin-right: 10px;" alt="New image preview">
                    </template>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Update Product</button>
        </form>
    </div>
</x-app-layout>
