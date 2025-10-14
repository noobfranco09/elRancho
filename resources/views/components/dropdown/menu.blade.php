@props([
    'label' => 'Más',
    'icon' => 'more_horiz'
])

<div
    x-data="{ open: false }"
    @click.away="open = false"
    class="relative"
>
    <!-- Botón -->
    <button
        @click="open = !open"
        class="flex flex-col items-center justify-center gap-2 p-4 bg-gray-100 dark:bg-gray-700
               text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600
               rounded-xl border border-gray-300 dark:border-gray-600 transition-all
               hover:-translate-y-0.5 w-full"
    >
        <span class="material-symbols-outlined text-xl">{{ $icon }}</span>
        <span class="text-xs font-medium">{{ $label }}</span>
    </button>

    <!-- Dropdown -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="absolute bottom-full right-0 mb-2 w-56 bg-white dark:bg-gray-800
               rounded-xl shadow-xl border border-gray-200 dark:border-gray-700 z-10"
        style="display: none;"
    >
        <div class="p-2">
            {{ $slot }}
        </div>
    </div>
</div>
