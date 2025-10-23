<div>
    <x-modal
        id="modal-ver-animales"
        title="Informacion de Animales Vacunados"
    >
        <!-- Contenedor principal del modal -->
        <div class="p-6 space-y-6 bg-white rounded-lg shadow-lg">
            
            <!-- Encabezado del modal con borde inferior sutil -->
            <div class="border-b-2 pb-4 flex items-center justify-between">
                <h3 class="text-2xl font-semibold text-gray-900">Animales Vacunados</h3>
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

            @if($animales->count() > 0)
                @foreach($animales as $animal)
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm space-y-4">
                    <h4 class="text-xl font-semibold text-gray-800">Nombre animal</h4>
                    <ul>

                        <li>
        
                            <p class="text-lg text-gray-700">{{ $animal->nombre }}</p>
                            
                        </li>

                    </ul>
                </div>
                @endforeach
            @else

                <h3 class="text-2xl font-semibold text-gray-900">No hay animales asociados a esta vacuna.</h3>

            @endif

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
