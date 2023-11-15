@php use App\Models\Category; @endphp
<x-app-layout>
    <div class="container" x-data="{ images: [] }">
        <h1>Post New Product</h1>

        <!-- If there are any validation errors, they will be displayed here -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="artisan_id" value="{{ auth()->id() }}">

            <!-- Name Field -->
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" required>
                    @foreach (Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description Field -->
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price Field -->
            <div>
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" required>
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Quantity Field -->
            <div>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required>
                @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="images">Images (up to 3):</label>
                <input type="file" id="images" name="images[]" multiple
                       @change="images = []; Array.from($event.target.files).forEach(file => {
                        let reader = new FileReader();
                        reader.onload = (e) => { images.push(e.target.result); };
                        reader.onerror = (e) => { console.error('FileReader error: ', e); };
                        reader.readAsDataURL(file);
                    })">
                @error('images')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('images.*')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div id="image-preview-container" x-show="images.length > 0">
                    <template x-for="image in images" :key="image">
                        <img :src="image" style="height: 100px; margin-right: 10px;" alt="Image preview">
                    </template>
                </div>
            </div>

            <button class="bg-secondary px-4 py-2 m-2 rounded-full text-md" type="submit">Submit</button>
        </form>
    </div>
</x-app-layout>
