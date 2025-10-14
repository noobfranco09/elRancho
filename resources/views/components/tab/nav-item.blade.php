@props([
    'target',
    'active' => false,
])

@php
    $tabId = $target . '-tab';
    $baseClasses = 'inline-block p-4 hover:bg-gray-100 dark:hover:bg-gray-700';
    $activeClasses = $active
        ? 'text-blue-600 rounded-ss-lg dark:bg-gray-800 dark:text-blue-500'
        : 'hover:text-gray-600 dark:hover:text-gray-300';
@endphp

<li class="me-2">
    <button
        id="{{ $tabId }}"
        data-tabs-target="#{{ $target }}"
        type="button"
        role="tab"
        aria-controls="{{ $target }}"
        aria-selected="{{ $active ? 'true' : 'false' }}"
        {{ $attributes->merge(['class' => $baseClasses . ' ' . $activeClasses]) }}>
        {{ $slot }}
    </button>
</li>
