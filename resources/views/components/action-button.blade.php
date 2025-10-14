@props([
    'icon',
    'label',
    'color' => 'blue',
    'iconClass' => '',
    'badge' => null,
])

@php
$colorConfig = match($color) {
    'red' => [
        'bg' => 'bg-red-50 dark:bg-red-900/20',
        'text' => 'text-red-600 dark:text-red-400',
        'hover' => 'hover:bg-red-100 dark:hover:bg-red-900/40',
        'border' => 'border-red-200 dark:border-red-800',
        'shadow' => 'hover:shadow-red-200/50 dark:hover:shadow-red-900/30',
    ],
    'green' => [
        'bg' => 'bg-green-50 dark:bg-green-900/20',
        'text' => 'text-green-600 dark:text-green-400',
        'hover' => 'hover:bg-green-100 dark:hover:bg-green-900/40',
        'border' => 'border-green-200 dark:border-green-800',
        'shadow' => 'hover:shadow-green-200/50 dark:hover:shadow-green-900/30',
    ],
    'amber' => [
        'bg' => 'bg-amber-50 dark:bg-amber-900/20',
        'text' => 'text-amber-600 dark:text-amber-400',
        'hover' => 'hover:bg-amber-100 dark:hover:bg-amber-900/40',
        'border' => 'border-amber-200 dark:border-amber-800',
        'shadow' => 'hover:shadow-amber-200/50 dark:hover:shadow-amber-900/30',
    ],
    'purple' => [
        'bg' => 'bg-purple-50 dark:bg-purple-900/20',
        'text' => 'text-purple-600 dark:text-purple-400',
        'hover' => 'hover:bg-purple-100 dark:hover:bg-purple-900/40',
        'border' => 'border-purple-200 dark:border-purple-800',
        'shadow' => 'hover:shadow-purple-200/50 dark:hover:shadow-purple-900/30',
    ],
    'teal' => [
        'bg' => 'bg-teal-50 dark:bg-teal-900/20',
        'text' => 'text-teal-600 dark:text-teal-400',
        'hover' => 'hover:bg-teal-100 dark:hover:bg-teal-900/40',
        'border' => 'border-teal-200 dark:border-teal-800',
        'shadow' => 'hover:shadow-teal-200/50 dark:hover:shadow-teal-900/30',
    ],
    'indigo' => [
        'bg' => 'bg-indigo-50 dark:bg-indigo-900/20',
        'text' => 'text-indigo-600 dark:text-indigo-400',
        'hover' => 'hover:bg-indigo-100 dark:hover:bg-indigo-900/40',
        'border' => 'border-indigo-200 dark:border-indigo-800',
        'shadow' => 'hover:shadow-indigo-200/50 dark:hover:shadow-indigo-900/30',
    ],
    default => [
        'bg' => 'bg-blue-50 dark:bg-blue-900/20',
        'text' => 'text-blue-600 dark:text-blue-400',
        'hover' => 'hover:bg-blue-100 dark:hover:bg-blue-900/40',
        'border' => 'border-blue-200 dark:border-blue-800',
        'shadow' => 'hover:shadow-blue-200/50 dark:hover:shadow-blue-900/30',
    ],
};

$classes = implode(' ', [
    $colorConfig['bg'],
    $colorConfig['text'],
    $colorConfig['hover'],
    $colorConfig['border'],
    $colorConfig['shadow'],
]);
@endphp

<button {{ $attributes->merge([
    'class' => "group relative flex flex-col items-center justify-center gap-2.5 p-5 rounded-xl border-2 transition-all duration-200 hover:-translate-y-1 hover:shadow-lg active:translate-y-0 active:shadow-md {$classes}"
]) }}>
    @if($badge)
    <span class="absolute -top-2 -right-2 flex items-center justify-center min-w-[20px] h-5 px-1.5 text-[10px] font-bold text-white bg-red-500 rounded-full shadow-md">
        {{ $badge }}
    </span>
    @endif

    <span class="material-symbols-outlined text-3xl transition-transform duration-200 group-hover:scale-110 {{ $iconClass }}">
        {{ $icon }}
    </span>

    <span class="text-sm font-semibold leading-tight text-center">
        {{ $label }}
    </span>
</button>
