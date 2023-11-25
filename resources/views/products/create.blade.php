@php use App\Models\Category; @endphp
<x-app-layout>
    <div class="container mx-auto px-4 py-6" x-data="{ images: [] }">
        <h1 class="text-xl font-semibold leading-7 text-gray-900">Post New Product</h1>
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Create Product Form -->
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
            <input type="hidden" name="artisan_id" value="{{ auth()->id() }}">
            <x-form-input name="name" required>Name:</x-form-input>
            <x-form-select name="category_id" label="Category:">
                @foreach (Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-form-select>
            <x-form-textarea name="description" required>Description:</x-form-textarea>
            <x-form-input type="number" name="price" step="0.01" required>Price:</x-form-input>
            <x-form-input type="number" name="quantity" required>Quantity:</x-form-input>
            <x-image-upload>Add More Images (up to 3):</x-image-upload>
            <!-- Submit Button -->
            <button class="rounded-md bg-primary px-4 py-2 text-lg text-white shadow-sm" type="submit">Submit</button>
        </form>
    </div>
</x-app-layout>
