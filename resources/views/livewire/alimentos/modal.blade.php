<div>
    <x-modal id="modal-alimento" title="Crear alimento">

        <form class="grid grid-cols-1 gap-5">

            <div>
                <x-form.input wire:model="nombre" label="Nombre" />
                <x-error-message> @error('nombre') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model="observaciones" label="Observaciones" />
                <x-error-message> @error('observaciones') {{ $message }} @enderror </x-error-message>
            </div>


            <div>
                <x-form.input wire:model="precio" label="Precio" />
                <x-error-message> @error('precio') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model="unidad" label="Unidad" />
                <x-error-message> @error('unidad') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model="cantidad" label="Cantidad" type="number" />
                <x-error-message> @error('cantidad') {{ $message }} @enderror </x-error-message>
            </div>

        </form>

        <x-slot:footer>

            <x-button variant="secondary" @click="Livewire.dispatch('closeModal')">
                Cancelar
            </x-button>

            <x-button variant="primary" form="form-animal" wire:click="save">
                Guardar
            </x-button>

        </x-slot:footer>
    </x-modal>
</div>