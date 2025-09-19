@props([
    'type' => 'button', // 'button', 'submit', 'reset'
    'href' => null,     // Si se provee, el componente se renderiza como una etiqueta <a>
    'variant' => 'primary' // 'primary', 'secondary', 'danger'
])

@php
    // Clases base compartidas por todos los botones
    $baseClasses = 'px-5 py-2.5 text-sm font-medium rounded-lg focus:outline-none focus:ring-4 inline-flex items-center justify-center';

    // Clases específicas para cada variante de color
    $variantClasses = [
        'primary' => 'px-5 py-2.5 text-sm font-medium rounded-lg text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-4 focus:ring-primary-300',
        'secondary' => 'px-5 py-2.5 text-sm font-medium rounded-lg text-primary-700 hover:text-primary-800 bg-primary-50 hover:bg-primary-100 focus:outline-none focus:ring-2 focus:ring-primary-300',
        'warning' => 'px-5 py-2.5 text-sm font-medium rounded-lg text-secondary-900 hover:text-secondary-800 bg-secondary-200 hover:bg-secondary-300 focus:outline-none focus:ring-2 focus:ring-secondary-400',
        'danger' => 'text-white bg-red-600 hover:bg-red-700 focus:ring-red-300',
    ][$variant] ?? $variantClasses['primary']; // 'primary' es el valor por defecto

    $classes = $baseClasses . ' ' . $variantClasses;
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
