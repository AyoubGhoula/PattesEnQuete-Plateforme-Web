@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-orange-400 dark:focus:border-orange-500 focus:ring-orange-400 dark:focus:ring-orange-500 rounded-md shadow-sm']) !!}>
