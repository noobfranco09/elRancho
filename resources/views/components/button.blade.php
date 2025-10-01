@props([
    'type' => 'button', // 'button', 'submit', 'reset'
    'href' => null,      // Si se provee, el componente se renderiza como una etiqueta <a>
    'variant' => 'primary', // 'primary', 'secondary', 'danger'
    'icon' => null // Nuevo prop para el nombre del icono
])

@php
    // Clases base compartidas por todos los botones
    $baseClasses = 'px-5 py-2.5 text-sm font-medium rounded-lg focus:outline-none focus:ring-4 inline-flex items-center justify-center';

    // Clases específicas para cada variante de color
    $variantClasses = [
        'primary' => 'text-sm font-medium rounded-lg text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-4 focus:ring-primary-300',
        'secondary' => 'text-sm font-medium rounded-lg text-primary-700 hover:text-primary-800 bg-primary-200 hover:bg-primary-300 focus:outline-none focus:ring-2 focus:ring-primary-300',
        'warning' => 'text-sm font-medium rounded-lg text-white hover:text-white bg-secondary-400 hover:bg-secondary-500 focus:outline-none focus:ring-2 focus:ring-secondary-400',
        'danger' => 'text-white bg-red-600 hover:bg-red-700 focus:ring-red-300',
        'blue' => 'text-sm font-medium rounded-lg text-white bg-terciary-400 hover:bg-terciary-700 focus:outline-none focus:ring-4 focus:ring-terciary-300'
    ][$variant] ?? $variantClasses['primary'];

    // Se mantiene el `inline-flex items-center` para alinear el icono y el texto
    $classes = 'inline-flex items-center justify-center text-sm font-bold rounded-lg focus:outline-none focus:ring-4 ' . $variantClasses;

    // Se añade un espacio si hay un icono Y texto
    $spaceClass = ($icon && !empty($slot->toHtml())) ? ' space-x-2' : '';

    $classes .= $spaceClass;
    $classes .= ($icon) ? " px-2 py-1" : " px-3 py-2"

@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)
            <span class="material-symbols-outlined shrink-0 text-lg">
                {{ $icon }}
            </span>
        @endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes ]) }}>
        @if ($icon)
            <span class="material-symbols-outlined shrink-0 text-lg">
                {{ $icon }}
            </span>
        @endif
        {{ $slot }}
    </button>
@endif
