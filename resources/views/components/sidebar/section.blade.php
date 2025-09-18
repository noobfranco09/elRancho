@props([
    'icon',
    'title',
    'selected' => false,
    'src' => '#'
])
<!--
    Icon: El icono de la seccion
    title: El titulo de la seccion
    selected: Si la seccion esta activa o seleccionada
-->

@if ($slot->isNotEmpty())
    <div x-data="{ open: false }">
        <button
            @click="open = !open"
            class="flex w-full items-center justify-between gap-3 rounded-lg px-3 py-2 text-gray-600 hover:bg-gray-100"
        >
            <div class="flex items-center gap-3">
                <span
                    class="material-symbols-outlined shrink-0"
                    >{{ $icon }}</span
                >
                <span
                    class="sidebar-text text-sm font-medium"
                    >{{ $title }}</span
                >
            </div>
            <span
                class="material-symbols-outlined shrink-0 sidebar-text transition-transform duration-200"
                :class="{'rotate-180': open}"
                >expand_more</span
            >
        </button>
        <div
            x-show="open"
            x-transition
            class="overflow-hidden"
        >
            <div class="mt-2 flex flex-col gap-1 pl-2">
                {{ $slot }}
            </div>
        </div>
    </div>
@else
    <a
        class="flex items-center gap-3 rounded-lg {{ ($selected) ? "bg-primary-100 text-primary-700" : "text-gray-600 hover:bg-gray-100" }} px-3 py-2"
        href="{{ $src }}"
    >
        <span class="material-symbols-outlined shrink-0"
            >{{ $icon }}</span
        >
        <span class="sidebar-text text-sm font-medium"
            >{{ $title }}</span
        >
    </a>
@endif
