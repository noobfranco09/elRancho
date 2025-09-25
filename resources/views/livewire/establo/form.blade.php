<div>

<x-modal
    id="modal-establo"
    title="Crear establo"
    action="#"
    method="POST"
    maxWidth="2xl"
>

    <div class="grid grid-cols-2 gap-6">
        <x-form.input name="nombre" wire:model="nombre" label="Nombre"   required />

        <x-form.input name="descripcion" wire:model="descripcion" label="Descripcion"   required />

        <x-form.input name="estado" wire:model="estado" label="Estado"   required />
        
    </div>

    <x-slot:footer>

        <x-button variant="secondary" data-modal-hide="modal-establo" >
            Cancelar
        </x-button>
        <x-button variant="primary" wire:click="save" data-modal-hide="modal-establo">
            Guardar
        </x-button>

    </x-slot:footer>
</x-modal>
</div>
