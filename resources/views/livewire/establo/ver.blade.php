<div>
    <x-modal
        id="modal-ver"
        title="Detalle de Establo"
    >
        <!-- Contenedor principal del modal -->
        <div class="p-6 space-y-6 bg-white rounded-lg shadow-lg">
            
            <!-- Encabezado del modal con borde inferior sutil -->
            <div class="border-b-2 pb-4 flex items-center justify-between">
                <h3 class="text-2xl font-semibold text-gray-900">Detalle del Establo</h3>
                <div class="flex items-center space-x-2 text-gray-600">
                    <!-- Icono o cualquier elemento adicional -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 2a8 8 0 11-8 8 8 8 0 018-8zM9 4a1 1 0 112 0v6a1 1 0 11-2 0V4z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm">Hace 5 min</span>
                </div>
            </div>

            <!-- Información estructurada del Establo -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Tarjetas con bordes suaves y sombras sutiles -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm space-y-4">
                    <h4 class="text-xl font-semibold text-gray-800">Nombre del Establo</h4>
                    <p class="text-lg text-gray-700">{{ $establo->nombre }}</p>
                </div>

                <!-- Sección de Estado -->
                <div class="flex justify-between items-center bg-gray-100 p-6 rounded-lg shadow-sm">
                    <h4 class="text-xl font-semibold text-gray-800">Estado</h4>
                    <div class="flex items-center space-x-2">
                        @if($establo->estado == "activo")
                        <div class="h-3 w-3 bg-green-500 rounded-full"></div>
                        <span class="text-lg text-green-700 font-medium">{{ $establo->estado}}</span>
                        @else
                        <div class="h-3 w-3 bg-red-500 rounded-full"></div>
                        <span class="text-lg text-red-700 font-medium">{{ $establo->estado}}</span>
                        @endif
                    </div>
                </div>
                

            </div>

            <!-- Sección de Descripcion -->
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm space-y-4">
                <h4 class="text-xl font-semibold text-gray-800">Descripcion</h4>
                <p class="text-lg text-gray-700">{{ $establo->descripcion}}</p>
            </div>
            
            

            <!-- Footer con botones bien diseñados -->
            <x-slot:footer>
                <div class="flex justify-end space-x-4">
                    <x-button variant="secondary" @click="Livewire.dispatch('closeModal')" class="px-6 py-2 text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md">
                        Volver
                    </x-button>
                </div>
            </x-slot:footer>

        </div>
    </x-modal>
</div>
