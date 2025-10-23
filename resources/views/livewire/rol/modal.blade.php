
<div>
    <x-modal
        id="modal-rol"
        title="Crear rol"
    >

        <form class="grid grid-cols-1 gap-5">

            <div>
                <x-form.input wire:model.live="nombre" label="Nombre"/>
                <x-error-message> @error('nombre') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.select wire:model="estado" label="Estado"
                    :options="[
                        '1' => 'Activo',
                        '0' => 'Inactivo'
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

            <x-button variant="primary" form="form-establo" wire:click="save">
                Guardar
            </x-button>

        </x-slot:footer>
    </x-modal>
</div>
