<!--
Componente de Modal Reutilizable
Props:
- id: (string) Requerido. ID único para el modal.
- title: (string) Requerido. Título a mostrar en la cabecera.
- action: (string) Opcional. URL de acción del formulario.
- method: (string) Opcional. Método del formulario (POST por defecto).
- maxWidth: (string) Opcional. Tamaño del modal (sm, md, lg, xl, 2xl).
Slots:
- default ($slot): Contenido principal del modal (cuerpo del formulario).
- footer: Contenido del pie de página (botones de acción).
-->
<div
    id="{{ $id }}"
    tabindex="-1"
    aria-hidden="true"
    class="fixed inset-0 z-[60] hidden w-full p-4 h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden flex justify-center items-center"
>
    <div
        class="relative w-full max-h-full max-w-2xl"
    >
        <div
            class="relative bg-white rounded-2xl border border-primary-100 shadow-xl"
        >
            @csrf
            @if(!in_array(strtoupper($method), ['GET', 'POST']))
                @method(strtoupper($method))
            @endif

            <!-- Header -->
            <div
                class="flex items-start justify-between p-4 rounded-t border-b border-primary-100 bg-primary-50/60"
            >
                <h3 class="text-xl font-semibold text-primary-800">
                    {{ $title }}
                </h3>
                <button
                    type="button"
                    class="text-primary-700/70 hover:text-primary-800 hover:bg-primary-100 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center focus:outline-none focus:ring-2 focus:ring-primary-300"
                    data-modal-hide="{{ $id }}"
                    aria-label="Close"
                >
                    <svg
                        class="w-3 h-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 14 14"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                        />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Body -->
            <div class="p-6 space-y-6">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <div
                class="flex items-center justify-end gap-3 p-6 border-t border-primary-100 rounded-b"
            >
                <slot name="footer">
                    <!-- Botones por defecto si no se provee un slot de footer -->
                    {{ $footer}}
                </slot>
            </div>
        </div>
    </div>
</div>
