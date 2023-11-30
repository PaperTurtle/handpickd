<div>
    <label class="block text-sm font-medium leading-6 text-gray-900" for="{{ $name }}">{{ $label }}</label>
    <select
        class="mt-1 block w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        name="{{ $name }}" id="{{ $name }}" required {{ $attributes }}>
        {{ $slot }}
    </select>
    @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>