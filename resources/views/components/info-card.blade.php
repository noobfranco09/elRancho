@props([
    'icon',
    'label',
    'value'
])
<div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 border border-gray-100 dark:border-gray-600 hover:scale-105 transition-transform duration-200">
    <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-1 flex items-center gap-1.5">
        <span class="material-symbols-outlined  text-blue-500">{{ $icon }}</span>
        {{ $label }}
    </dt>
    <dd class="text-lg font-bold text-gray-900 dark:text-white">
        {{ $value }}
    </dd>
</div>
