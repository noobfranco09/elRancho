
<div>
    <x-modal
        id="modal-alimentacion"
        title="Asignar alimentación"
    >

        <form class="grid grid-cols-1 gap-5">

            <div>
                <x-form.input wire:model.live="cantidad" label="Cantidad"/>
                <x-error-message> @error('cantidad') {{ $message }} @enderror </x-error-message>
            </div>


            <div>
                <x-form.select wire:model="alimentoId" label="Alimento"
                    :options="['' => 'Seleccionar un alimento'] + $alimentos"
                    />
                    <x-error-message> @error('alimentoId') {{ $message }} @enderror </x-error-message>
            </div>


            <div>
                <x-form.input wire:model.live="fecha" type="date" label="Fecha de alimentación" />
                <x-error-message> @error('fecha') {{ $message }} @enderror </x-error-message>
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

