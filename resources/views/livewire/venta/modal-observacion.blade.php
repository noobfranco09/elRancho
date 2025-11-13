
<div>
    <x-modal
        id="modal-observacion"
        title="Añadir observacion"
    >

        <form class="grid grid-cols-1 gap-5">

            <div>
                <x-form.textarea wire:model.live="observacion" label="Observación" />
                <x-error-message> @error('observacion') {{ $message }} @enderror </x-error-message>
            </div>


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
