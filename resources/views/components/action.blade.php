@props([
    'icon',                 // SVG o nombre del icono
    'label',                // Título (ej: "Nuevo Usuario")
    'description' => '',    // Texto secundario
    'shortcut' => null,     // Ej: "CTRL+N"
    'color' => 'blue',      // Colores base
    'iconClass' => '',      // Clases extra para el ícono SVG o material
    'href' => null,         // URL opcional
])

@php
$colorConfig = match($color) {
    'red' => [
        'bg' => 'bg-red-100',
        'text' => 'text-red-600',
        'hoverBg' => 'group-hover:bg-red-500',
        'hoverText' => 'group-hover:text-red-600',
        'hoverIcon' => 'group-hover:text-white',
        'borderHover' => 'hover:border-red-500',
    ],
    'green' => [
        'bg' => 'bg-green-100',
        'text' => 'text-green-600',
        'hoverBg' => 'group-hover:bg-green-500',
        'hoverText' => 'group-hover:text-green-600',
        'hoverIcon' => 'group-hover:text-white',
        'borderHover' => 'hover:border-green-500',
    ],
    'amber' => [
        'bg' => 'bg-amber-100',
        'text' => 'text-amber-600',
        'hoverBg' => 'group-hover:bg-amber-500',
        'hoverText' => 'group-hover:text-amber-600',
        'hoverIcon' => 'group-hover:text-white',
        'borderHover' => 'hover:border-amber-500',
    ],
    'purple' => [
        'bg' => 'bg-purple-100',
        'text' => 'text-purple-600',
        'hoverBg' => 'group-hover:bg-purple-500',
        'hoverText' => 'group-hover:text-purple-600',
        'hoverIcon' => 'group-hover:text-white',
        'borderHover' => 'hover:border-purple-500',
    ],
    'teal' => [
        'bg' => 'bg-teal-100',
        'text' => 'text-teal-600',
        'hoverBg' => 'group-hover:bg-teal-500',
        'hoverText' => 'group-hover:text-teal-600',
        'hoverIcon' => 'group-hover:text-white',
        'borderHover' => 'hover:border-teal-500',
    ],
    'indigo' => [
        'bg' => 'bg-indigo-100',
        'text' => 'text-indigo-600',
        'hoverBg' => 'group-hover:bg-indigo-500',
        'hoverText' => 'group-hover:text-indigo-600',
        'hoverIcon' => 'group-hover:text-white',
        'borderHover' => 'hover:border-indigo-500',
    ],
    default => [
        'bg' => 'bg-blue-100',
        'text' => 'text-blue-600',
        'hoverBg' => 'group-hover:bg-blue-500',
        'hoverText' => 'group-hover:text-blue-600',
        'hoverIcon' => 'group-hover:text-white',
        'borderHover' => 'hover:border-blue-500',
    ],
};
@endphp

@php
$containerClasses = "bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-all duration-300 border-2 border-transparent group {$colorConfig['borderHover']}";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $containerClasses . ' cursor-pointer block']) }}>
@else
    <div {{ $attributes->merge(['class' => $containerClasses . ' cursor-pointer']) }}>
@endif
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 {{ $colorConfig['bg'] }} rounded-lg flex items-center justify-center transition-colors {{ $colorConfig['hoverBg'] }}">
                @if(Str::startsWith($icon, '<svg'))
                    {!! $icon !!}
                @else
                    <span class="material-symbols-outlined w-6 h-6 {{ $colorConfig['text'] }} transition-colors {{ $colorConfig['hoverIcon'] }} {{ $iconClass }}">
                        {{ $icon }}
                    </span>
                @endif
            </div>

            @if($shortcut)
                <span class="text-xs font-semibold text-gray-400 transition-colors {{ $colorConfig['hoverText'] }}">
                    {{ $shortcut }}
                </span>
            @endif
        </div>

        <h3 class="text-lg font-semibold text-gray-900 mb-1">
            {{ $label }}
        </h3>

        @if($description)
            <p class="text-sm text-gray-600">
                {{ $description }}
            </p>
        @endif
@if($href)
    </a>
@else
    </div>
@endif
