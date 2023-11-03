<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot> --}}
    <div class="container">
        <h1 class="text-xl font-bold font-heading">Product Listings</h1>
        <ul>
            @foreach ($products as $product)
                <li>
                    <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
