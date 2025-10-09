@props(['id' => 'defaultTab'])

<div {{ $attributes->merge(['class' => 'bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700']) }}>
    <!-- Tab Navigation -->
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
        id="{{ $id }}"
        data-tabs-toggle="#{{ $id }}Content"
        role="tablist">
        {{ $navigation }}
    </ul>

    <!-- Tab Content -->
    <div id="{{ $id }}Content">
        {{ $slot }}
    </div>
</div>
