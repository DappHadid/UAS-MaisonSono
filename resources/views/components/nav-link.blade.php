@props(['active'])

@php

$classes = ($active ?? false)
            ? 'flex items-center w-full p-3 text-base font-semibold text-indigo-700 bg-indigo-50 dark:bg-gray-700 dark:text-white border-l-4 border-indigo-500 rounded-r-lg'
            : 'flex items-center w-full p-3 text-base font-medium text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>