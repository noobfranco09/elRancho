
@props([
    'id',
    'active' => false,
])

@php
    $panelId = $id;
    $tabId = $id . '-tab';
    $visibilityClass = $active ? '' : 'hidden';
@endphp

<div
    class="{{ $visibilityClass }} p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800"
    id="{{ $panelId }}"
    role="tabpanel"
    aria-labelledby="{{ $tabId }}"
    {{ $attributes }}>
    {{ $slot }}
</div>
