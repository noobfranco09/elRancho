
<div>
    <x-modal
        id="modal-cajon"
        title="Crear cajon"
    >

        <form class="grid grid-cols-1 gap-5">

            <div>
                <x-form.input wire:model="codigo" label="Codigo"/>
                <x-error-message> @error('codigo') {{ $message }} @enderror </x-error-message>
            </div>


            <div>
                <x-form.select wire:model="establo_id" label="Estado"
                    :options="['' => 'Seleccione un establo'] + $establos"
                    required
                    />
                <x-error-message> @error('establo_id') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.select wire:model="estado" label="Estado"
                    :options="[
                        '1' => 'Libre',
                        '0' => 'Ocupado'
                    ]"
                    required
                    />
                    <x-error-message> @error('estado') {{ $message }} @enderror </x-error-message>
            </div>


        </form>

        <x-slot:footer>

            <x-button variant="secondary"  @click="Livewire.dispatch('closeModal')" >
                Cancelar
            </x-button>

            <x-button variant="primary" form="form-cajon" wire:click="save">
                Guardar
            </x-button>

        </x-slot:footer>
    </x-modal>
</div>
