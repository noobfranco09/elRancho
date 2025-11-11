<div>
    <x-modal
        id="modal-tratamiento"
        title="Registrar tratamiento"
    >


        <div class="flex gap-2">
            <x-form.input
                type="text"
                wire:model.defer="nuevoTratamiento"
                wire:keydown.enter="save"
                label="Nuevo tratamiento"
                span="flex-1"
            />

            <x-form.input
                type="date"
                wire:model.defer="fechaPrescripcion"
                wire:keydown.enter="save"
                label="Fecha de prescripcion"
                span="flex-1"
            />

            <x-button wire:click="save">
                Crear
            </x-button>
        </div>

        @error('nuevaEspecie') <x-error-message> {{ $message }} </x-error-message> @enderror

        <!-- Separador -->
        <div class="border-t border-gray-200 dark:border-gray-700"></div>

        <!-- Lista de especies -->
        <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($tratamientos as $tratamiento)
                <li class="py-3 sm:py-4" wire:key="tratamiento-{{ $tratamiento->id }}">
                    <div class="flex items-center space-x-3">
                        <div class="flex-1 min-w-0">
                            @if($isEditing === $tratamiento->id)
                                <x-form.input
                                    wire:model.defer="nuevaEspecieEditar.{{ $tratamiento->id }}"
                                />
                                @error('nuevoTratamientoEditar.$tratamiento->id') <x-error-message> {{ $message }}</x-error-message> @enderror
                            @else
                                <x-form.input
                                    value="{{ $tratamiento->id }}"
                                    disabled
                                />
                            @endif
                        </div>
                        <div class="flex items-center space-x-2">
                            <!-- Botón Editar/Guardar -->
                            <x-button
                                wire:click="toggleEdit({{ $tratamiento->id }})"
                                icon="{{ ($isEditing === $tratamiento->id ) ? 'check_circle' : 'edit'}}"
                                variant="{{ ($isEditing === $tratamiento->id ) ? 'primary' : 'warning' }}"
                            />
                            <!-- Botón Eliminar -->
                            <x-button
                                variant="danger"
                                icon="delete"
                                wire:click="delete({{ $tratamiento->id }})"
                            />
                        </div>
                    </div>
                </li>
            @empty
                <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                    No hay tratamientos registrados
                </div>
            @endforelse
        </ul>

        <x-slot:footer>

            <x-button variant="secondary"  @click="Livewire.dispatch('closeModal')" >
                Cerrar
            </x-button>

        </x-slot:footer>
    </x-modal>
</div>
