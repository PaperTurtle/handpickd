@php use App\Models\Category; @endphp
<x-app-layout>
    <div class="container mx-auto px-4 py-6" x-data="{ images: [] }">
        <h1 class="text-xl font-semibold leading-7 text-gray-900">Post New Product</h1>

        <!-- If there are any validation errors, they will be displayed here -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
            <input type="hidden" name="artisan_id" value="{{ auth()->id() }}">

            <!-- Name Field -->
            <div>
                <label class="block text-sm font-medium leading-6 text-gray-900" for="name">Name:</label>
                <input
                    class="mt-1 block w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" id="name" name="name" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium leading-6 text-gray-900" for="category_id">Category:</label>
                <select
                    class="mt-1 block w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    name="category_id" id="category_id" required>
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
                <label class="block text-sm font-medium leading-6 text-gray-900" for="description">Description:</label>
                <textarea
                    class="mt-1 block w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    id="description" name="description" required></textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price Field -->
            <div>
                <label class="block text-sm font-medium leading-6 text-gray-900" for="price">Price:</label>
                <input
                    class="mt-1 block w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="number" id="price" name="price" step="0.01" required>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Quantity Field -->
            <div>
                <label class="block text-sm font-medium leading-6 text-gray-900" for="quantity">Quantity:</label>
                <input
                    class="mt-1 block w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="number" id="quantity" name="quantity" required>
                @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

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
                                <input type="file" id="images" name="images[]" multiple type="file" multiple
                                    class="sr-only" <input type="file" id="images" name="images[]" multiple
                                    accept="image/png, image/jpeg, image/jpg, image/gif, image/svg+xml"
                                    @change="images = []; Array.from($event.target.files).forEach(file => {
                                    let reader = new FileReader();
                                    reader.onload = (e) => { images.push(e.target.result); };
                                    reader.onerror = (e) => { console.error('FileReader error: ', e); };
                                    reader.readAsDataURL(file);
                                })">
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
                    <div id="image-preview-container" x-show="images.length > 0">
                        <template x-for="image in images" :key="image">
                            <img :src="image" style="height: 100px; margin-right: 10px;" alt="Image preview">
                        </template>
                    </div>
                </div>
            </div>

            <button class="bg-secondary px-4 py-2 m-2 rounded-full text-md" type="submit">Submit</button>
        </form>
    </div>
</x-app-layout>
