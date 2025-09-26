
<div>
    <x-modal
        id="modal-eliminar"
        title="Notificacion"
    >

    Estar seguro de que deseas desactivar este establo?


        <x-slot:footer>

            <x-button variant="secondary"  @click="Livewire.dispatch('closeModal')" >
                Cancelar
            </x-button>

            <x-button variant="danger" form="form-establo" wire:click="eliminar">
                Desactivar
            </x-button>

        </x-slot:footer>
    </x-modal>
</div>
