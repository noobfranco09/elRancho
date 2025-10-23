
<div>
    <x-modal
        id="modal-animal"
        title="Crear vacuna"
    >

        <form class="grid grid-cols-1 gap-5">

            <div>
                <x-form.input wire:model.live="nombre" label="Nombre"/>
                <x-error-message> @error('nombre') {{ $message }} @enderror </x-error-message>
            </div>


            <div>
                <x-form.input wire:model.live="descripcion" label="Descripcion" />
                <x-error-message> @error('descripcion') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model.live="dosis" label="Dosis" />
                <x-error-message> @error('dosis') {{ $message }} @enderror </x-error-message>
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
