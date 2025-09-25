
<div>
    <x-modal
        id="modal-animal"
        title="Crear vacuna"
    >

        <form class="grid grid-cols-2 gap-6">

            <x-form.input wire:model="nombre" label="Nombre"   required />

            <x-form.input wire:model="descripcion" label="Descripcion" required />

            <x-form.input wire:model="dosis" label="Dosis" required />

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
