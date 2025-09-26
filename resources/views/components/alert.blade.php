@props([
    'id' => 'popup-alert', {{-- Cambiado de 'popup-modal' a 'popup-alert' para reflejar el nuevo propósito --}}
    'maxWidth' => 'md',
    'message' => ""
])

@php
$maxWidthClasses = [
    'sm' => 'max-w-sm',
    'md' => 'max-w-md',
    'lg' => 'max-w-lg',
    'xl' => 'max-w-xl',
    '2xl' => 'max-w-2xl',
][$maxWidth];
@endphp

{{--
    Este es ahora un contenedor de diseño estático o una tarjeta,
    sin las clases de posicionamiento fijo ni ocultamiento de un modal.
    Simplemente toma el diseño interno del modal.
--}}
<div id="{{ $id }}" class=" {{ $maxWidthClasses }} mx-auto"> {{-- Eliminadas clases de modal: hidden, fixed, z-50, overflow, w-full, h-[...], etc. Se agregó mx-auto para centrar. --}}
    <div class="relative bg-white rounded-lg shadow-xl"> {{-- Se cambió shadow-sm por shadow-xl para darle más presencia como un componente de diseño. --}}

        {{-- El botón de cerrar se quita o se comenta, ya que no tiene sentido en un componente estático.
        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close component</span>
        </button>
        --}}

        <div class="p-4 md:p-5 text-center">
            {{-- Icono de Advertencia/Información --}}
            <svg class="mx-auto mb-4 text-red-500 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"> {{-- Se cambió el color del icono a rojo para una alerta de eliminación --}}
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>

            {{-- Mensaje principal --}}
            <h3 class="mb-5 text-xl font-semibold text-gray-800">{{ $message }}</h3> {{-- Aumentado el tamaño de la fuente para más impacto --}}

            {{-- Contenido del slot principal (se puede usar para texto adicional o elementos) --}}
            {{ $slot }}

            {{-- Slot para botones de acción (footer) --}}
            @if (isset($footer))
                <div class="mt-6 flex justify-center space-x-4"> {{-- Agregado flex y justify-center para centrar los botones --}}
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
