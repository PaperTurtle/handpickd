<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'block mt-4 w-full rounded-md bg-primary hover:bg-accent px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all delay-[20ms]']) }}>
    {{ $slot }}
</button>
