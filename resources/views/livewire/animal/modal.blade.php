<div>
    <x-modal
        id="modal-animal"
        title="Crear animal"
        action="#"
        method="POST"
        maxWidth="2xl"
    >

        <form id="form-animal" class="grid grid-cols-2 gap-6">
            <x-form.input wire:model="nombre" label="Nombre"   required />

            <x-form.input wire:model="codigo" label="Codigo"   required />

            <x-form.input type="number" wire:model="precio" label="Precio"   required />

            <x-form.input wire:model="imagen" label="Imagen"   required />

            <x-form.input wire:model="sexo" label="Sexo"   required />

            <x-form.input wire:model="color" label="Color"   required />

            <x-form.input wire:model="marcas" label="Marcas"   required />

            <x-form.input wire:model="salud" label="Salud"   required />

            <x-form.input type="date" wire:model="fechaNacimiento" label="Fecha de nacimiento"   required />

            <x-form.input wire:model="estado" label="Estado"   required />

        </form>

        <x-slot:footer>

            <x-button variant="secondary"  @click="Livewire.dispatch('closeModal')" >
                Cancelar
            </x-button>

            <x-button variant="primary" form="form-animal" wire:click="save">
                Guardar
            </x-button>

        </x-slot:footer>
    </x-modal>
</div>
