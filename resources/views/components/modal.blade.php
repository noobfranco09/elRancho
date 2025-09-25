
<!-- resources/views/components/card-panel.blade.php -->

<!--
Componente Panel (tipo modal pero sin overlay)
Props:
- title: (string) Requerido. Título de la cabecera.
- maxWidth: (string) Opcional. Tamaño del panel (sm, md, lg, xl, 2xl).
Slots:
- default ($slot): Contenido principal del panel.
- footer: Contenido del pie de página (botones de acción).
-->
<div class="w-full flex justify-center">
    <div class="relative w-full max-w-3xl">
        <div class="relative bg-white rounded-2xl border border-primary-100 shadow-xl">
            <!-- Header -->
            <div class="flex items-start justify-between p-4 rounded-t border-b border-primary-100 bg-primary-50/60">
                <h3 class="text-xl font-semibold text-primary-800">
                    {{ $title }}
                </h3>
                <!-- Botón de cierre opcional -->
                <button
                    type="button"
                    class="text-primary-700/70 hover:text-primary-800 hover:bg-primary-100 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center focus:outline-none focus:ring-2 focus:ring-primary-300"
                    @click="Livewire.dispatch('closeModal')"
                    aria-label="Close"
                >
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>

            <!-- Body -->
            <div class="p-6 space-y-6">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <div class="flex items-center justify-end gap-3 p-6 border-t border-primary-100 rounded-b">
                {{ $footer ?? '' }}
            </div>
        </div>
    </div>
</div>
