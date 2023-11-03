@props(['active'])

@php
    $activeClasses = 'block w-2/3 pl-3 pr-4 py-2  text-left text-base font-medium text-blue-700 transition ease-in-out duration-150 bg-background rounded-r-full';
    $inactiveClasses = 'block w-2/3 pl-3 pr-4 py-2 border-transparent text-left text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 transition ease-in-out duration-150 text-background hover:bg-secondary hover:text-text rounded-r-full';

    $classes = $active ? $activeClasses : $inactiveClasses;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
