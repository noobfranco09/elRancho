<div>
    <x-modal id="modal-AsignarAnimales" title="Asignar Animal" class="space-y-4">

        <!-- Input de búsqueda -->
        <div class="flex gap-2">
            <x-form.input
                type="text"
                wire:model.defer="buscarAnimal"
                label="Buscar Animal"
                span="flex-1"
                placeholder="Ingrese el nombre del animal"
            />

            <x-form.input
                type="text"
                wire:model.defer="buscarCajon"
                label="Buscar Cajon"
                span="flex-1"
                placeholder="Ingrese el codigo del cajon"
            />

            <x-button variant="blue" wire:click="buscar">
                Buscar
            </x-button>
        </div>

        <!-- Separador -->
        <div class="border-t border-gray-200 dark:border-gray-700"></div>

        <div class="flex-1">
            <x-form.select wire:model="animal_id" label="Animal encontrado"
                :options="$animales"
                placeholder="Seleccione un animal"
            />
        </div>

        <div class="flex-1">
            <x-form.select wire:model="cajon_id" label="Cajon encontrado"
                :options="$cajones"
                placeholder="Seleccione un cajon"
            />
        </div>

        <x-slot:footer>
            <x-button wire:click="save">
                Asignar
            </x-button>
            <x-button variant="secondary" wire:click="$dispatch('closeModal')">
                Cancelar
            </x-button>
        </x-slot:footer>
    </x-modal>
</div>
