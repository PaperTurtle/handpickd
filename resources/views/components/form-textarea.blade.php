<div class="w-1/4 md:w-1/2">
    <label class="block text-sm font-medium leading-6 text-gray-900" for="{{ $name }}">{{ $slot }}</label>
    <textarea
        class="w-full mt-1 block rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        id="{{ $name }}" name="{{ $name }}" {{ $attributes }}>{{ $value ?? '' }}</textarea>
    @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
