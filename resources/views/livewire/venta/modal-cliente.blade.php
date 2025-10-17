<div>
    <x-modal
        id="modal-cliente"
        title="Identificacion del cliente"
    >

        <form class="grid grid-cols-1 gap-5">

            <div>
                <x-form.input wire:model.live="identificacion" label="Cédula o teléfono del cliente"/>
                <x-error-message> @error('identificacion') {{ $message }} @enderror </x-error-message>
            </div>


        </form>

        <x-slot:footer>

            <x-button variant="secondary"  @click="Livewire.dispatch('closeModal')" >
                Cancelar
            </x-button>

            <x-button variant="primary" form="form-animal" wire:click="buscarCliente">
                Continuar
            </x-button>

        </x-slot:footer>
    </x-modal>
</div>
