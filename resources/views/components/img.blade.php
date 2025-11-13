@props([
    'src' => null,
    'alt' => 'Imagen',
    'class' => 'h-10 w-10 aspect-square rounded-full object-cover shrink-0',
])

@php
    $path = $src ? public_path('storage/' . $src) : null;

    $finalSrc = ($src && file_exists($path))
        ? asset('storage/' . $src)
        : 'https://via.placeholder.com/150?text=Sin+imagen';
@endphp

<img
    src="{{ $finalSrc }}"
    alt="{{ $alt }}"
    class="{{ $class }}"
/>
