@props([
    'icon',
    'label',
    'color' => 'blue',
    'iconClass' => '',
])

@php
$baseColor = match($color) {
    'red' => 'bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/40 border-red-200 dark:border-red-800',
    'green' => 'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 hover:bg-green-100 dark:hover:bg-green-900/40 border-green-200 dark:border-green-800',
    'amber' => 'bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-900/40 border-amber-200 dark:border-amber-800',
    'purple' => 'bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400 hover:bg-purple-100 dark:hover:bg-purple-900/40 border-purple-200 dark:border-purple-800',
    default => 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/40 border-blue-200 dark:border-blue-800'
};
@endphp

<button {{ $attributes->merge([
    'class' => "flex flex-col items-center justify-center gap-2 p-4 rounded-xl border transition-all hover:-translate-y-0.5 $baseColor"
]) }}>
    <span class="material-symbols-outlined text-xl {{ $iconClass }}">{{ $icon }}</span>
    <span class="text-xs font-medium">{{ $label }}</span>
</button>
