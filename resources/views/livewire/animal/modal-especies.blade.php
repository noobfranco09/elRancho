<div>
    <x-modal id="modal-especies" title="Especies" class="space-y-4">

        <!-- Input para crear nueva especie -->
        <div class="flex gap-2">
            <x-form.input
                type="text"
                wire:model.defer="nuevaEspecie"
                wire:keydown.enter="save"
                label="Nueva especie"
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
            @forelse($especies as $especie)
                <li class="py-3 sm:py-4" wire:key="especie-{{ $especie->id }}">
                    <div class="flex items-center space-x-3">
                        <div class="flex-1 min-w-0">
                            @if($isEditing === $especie->id)
                                <x-form.input
                                    wire:model.defer="nuevaEspecieEditar.{{ $especie->id }}"
                                />
                                @error('nuevaEspecieEditar.$especie->id') <x-error-message> {{ $message }}</x-error-message> @enderror
                            @else
                                <x-form.input
                                    value="{{ $especie->nombre }}"
                                    disabled
                                />
                            @endif
                        </div>
                        <div class="flex items-center space-x-2">
                            <!-- Botón Editar/Guardar -->
                            <x-button
                                wire:click="toggleEdit({{ $especie->id }})"
                                icon="{{ ($isEditing === $especie->id ) ? 'check_circle' : 'edit'}}"
                                variant="{{ ($isEditing === $especie->id ) ? 'primary' : 'warning' }}"
                            />
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

        <x-slot:footer>
            <x-button variant="secondary" wire:click="$dispatch('closeModal')">
                Cerrar
            </x-button>
        </x-slot:footer>
    </x-modal>
</div>
