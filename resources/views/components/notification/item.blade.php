@props([
    // Icono de Material Symbols (e.g., 'warning', 'person', 'check_circle')
    'icon' => 'warning',

    // Color base para Tailwind (e.g., 'amber', 'emerald', 'red').
    // Se usa para generar las clases de color (bg-{color}-100, text-{color}-600, etc.).
    'color' => 'amber',

    // El texto principal de la notificación.
    'text',

    // La etiqueta o categoría de la notificación (e.g., 'Inventario', 'Proyecto').
    'label',

    // El tiempo transcurrido (e.g., '15 min ago').
    'time',

    // URL de enlace.
    'link' => '#'
])

<a
    href="{{ $link }}"
    class="group flex gap-3 rounded-xl px-3 py-3 transition duration-150 ease-in-out hover:bg-{{ $color }}-50"
>
    <!-- CONTENEDOR DEL ÍCONO DINÁMICO -->
    <div class="relative shrink-0">
        <span
            class="material-symbols-outlined h-10 w-10 flex items-center justify-center rounded-full text-2xl
                   bg-{{ $color }}-100 text-{{ $color }}-600 font-bold shrink-0"
            aria-hidden="true"
        >
            {{ $icon }}
        </span>
    </div>

    <!-- CONTENIDO DE LA ALERTA DINÁMICA -->
    <div class="min-w-0">
        <p class="text-sm text-gray-700">
            <!-- Título basado en el ícono o la etiqueta -->
            <span class="font-semibold text-{{ $color }}-700">
                @if ($icon === 'warning' && $color === 'amber')
                    Alerta de Stock Bajo
                @else
                    {{ $label }}
                @endif
            </span>
            — {!! $text !!}
        </p>
        <div
            class="mt-1 flex items-center gap-2 text-xs text-gray-500"
        >
            <!-- Etiqueta y Tiempo Dinámicos -->
            <span>{{ $label }}</span>
            <span>•</span>
            <span>{{ $time }}</span>
        </div>
    </div>
</a>
