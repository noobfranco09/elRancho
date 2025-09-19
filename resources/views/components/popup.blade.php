@props([
    'id' => 'popup-modal',
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

<!--
  Este es el contenedor principal del modal.
  Escucha eventos de Alpine.js para mostrarse u ocultarse.
  El atributo `data-modal-hide` en los botones debe coincidir con el `id` para que funcione el cierre.
-->
<div id="{{ $id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full {{ $maxWidthClasses }} max-h-full">
        <!-- Contenido del Modal -->
        <div class="relative bg-white rounded-lg shadow-sm">

            <!-- Botón para cerrar el modal -->
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="{{ $id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="p-4 md:p-5 text-center">
                <!-- El contenido principal (icono, título, texto) se inserta aquí -->
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>

                <h3 class="mb-5 text-lg font-normal text-gray-600">{{ $message }}</h3>

                {{ $slot }}

                <!-- Los botones de acción se insertan en este slot -->
                @if (isset($footer))
                    <div class="mt-6">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

