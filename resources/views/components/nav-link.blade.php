@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center py-2 px-2 md:px-4 rounded-full bg-background font-semibold transition-colors duration-300 text-sm lg:text-base whitespace-nowrap' : 'inline-flex items-center py-2 px-4 rounded-full hover:bg-secondary hover:text-text transition-colors duration-300 text-sm lg:text-base text-background font-semibold whitespace-nowrap';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
