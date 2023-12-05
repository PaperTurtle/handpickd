@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 focus:border-primary focus:ring-primary transition-all delay-[10ms] rounded-md shadow-sm',
]) !!}>
