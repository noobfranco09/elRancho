<div>
    <x-modal id="modal-especies" title="Especies">
 <div x-data="{
            editando: {},
            editandoValor: {},
            toggleEdicion(id, nombre) {
                this.editando[id] = !this.editando[id];
                if (this.editando[id]) {
                    this.editandoValor[id] = nombre;
                }
            },
            isEditando(id) {
                return this.editando[id] || false;
            }
        }" class="space-y-4">

            <!-- Input para crear nueva especie -->
            <div class="flex gap-2">
                <input
                    type="text"
                    wire:model="nuevaEspecie"
                    @keydown.enter="$wire.save()"
                    placeholder="Nueva especie..."
                    class="flex-1 px-4 py-2.5 text-sm bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-blue-500 focus:border-blue-500"
                />
                <button
                    wire:click="save"
                    type="button"
                    class="px-4 py-2.5 text-sm font-medium text-white bg-blue-600 dark:bg-blue-700 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 transition-colors flex items-center gap-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Agregar
                </button>
            </div>

            <!-- Separador -->
            <div class="border-t border-gray-200 dark:border-gray-700"></div>

            <!-- Lista de especies -->
            <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($especies as $especie)
                    <li class="py-3 sm:py-4" wire:key="especie-{{ $especie->id }}">
                        <div class="flex items-center space-x-3">
                            <div class="flex-1 min-w-0">
                                <input
                                    type="text"
                                    x-model="editandoValor[{{ $especie->id }}]"
                                    x-bind:disabled="!isEditando({{ $especie->id }})"
                                    x-bind:class="isEditando({{ $especie->id }}) ?
                                        'bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white' :
                                        'bg-gray-50 dark:bg-gray-800 border-transparent text-gray-700 dark:text-gray-300 cursor-default'"
                                    class="block w-full px-3 py-2 text-sm rounded-lg border focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    value="{{ $especie->nombre }}"
                                    x-init="editandoValor[{{ $especie->id }}] = '{{ $especie->nombre }}'"
                                />
                            </div>
                            <div class="flex items-center space-x-2">
                                <!-- Botón Editar/Guardar -->

                                <x-button
                                    icon="delete"
                                />
                                <button
                                    @click="toggleEdicion({{ $especie->id }}, '{{ $especie->nombre }}'); if(!isEditando({{ $especie->id }})) { $wire.save({{ $especie->id }}, editandoValor[{{ $especie->id }}]) }"
                                    type="button"
                                    x-bind:class="isEditando({{ $especie->id }}) ?
                                        'text-green-600 hover:text-green-700 dark:text-green-500 dark:hover:text-green-400' :
                                        'text-blue-600 hover:text-blue-700 dark:text-blue-500 dark:hover:text-blue-400'"
                                    class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                                >
                                    <svg x-show="!isEditando({{ $especie->id }})" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <svg x-show="isEditando({{ $especie->id }})" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>

                                <!-- Botón Eliminar -->
                                <x-button
                                    variant="danger"
                                    icon="delete"
                                    wire:click="delete({{ $especie->id }})"
                                />
                            </div>
                        </div>
                    </li>
                @empty
                    <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                        No hay especies registradas
                    </div>
                @endforelse
            </ul>

        </div>
        <x-slot:footer>
            <x-button variant="secondary"  @click="Livewire.dispatch('closeModal')" >
                Cerrar
            </x-button>
        </x-slot:footer>
    </x-modal>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

</div>
