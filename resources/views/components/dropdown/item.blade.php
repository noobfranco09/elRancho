@props([
    'icon',
])

<button
    {{ $attributes->merge([
        'class' => 'w-full text-left px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700
                    rounded-lg text-sm text-gray-700 dark:text-gray-300
                    flex items-center gap-3 transition-colors'
    ]) }}
>
    <span class="material-symbols-outlined text-gray-400">{{ $icon }}</span>
    {{ $slot }}
</button>
