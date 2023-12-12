@php use App\Models\Category; @endphp
<x-app-layout>
    <div class="container mx-auto px-4 py-6 flex flex-col items-center justify-center sm:px-6 lg:px-8"
        x-data="{
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
        <h1 class="text-3xl font-semibold leading-9 text-gray-900 font-heading mb-4 mt-4 text-center ">Edit
            "{{ $product->name }}"</h1>
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Edit Product Form -->
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data"
            class="mt-6 space-y-6 min-w-[1083.4px] flex flex-col justify-center items-center">
            @csrf
            @method('PUT')

            <input type="hidden" name="artisan_id" value="{{ auth()->id() }}">

            <x-form-input name="name" required :value="$product->name">Name:</x-form-input>

            <x-form-select name="category_id" label="Category:">
                @foreach (Category::all() as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </x-form-select>

            <x-form-textarea name="description" label="Description:" :value="$product->description">Description:</x-form-textarea>

            <x-form-input type="number" name="price" label="Price:" :value="$product->price"
                step="0.01">Price:</x-form-input>

            <x-form-input type="number" name="quantity" required :value="$product->quantity">Quantity:</x-form-input>
            <x-existing-images-display :images="$product->images"></x-existing-images-display>

            <x-image-upload-edit :product="$product" />

            <button type="submit"
                class="w-1/4 md:w-1/2 rounded-md bg-primary px-4 py-2 text-lg text-white shadow-sm hover:bg-accent transition-all delay-[10ms] ease-in-out">Update
                Product
            </button>
        </form>
    </div>
</x-app-layout>
