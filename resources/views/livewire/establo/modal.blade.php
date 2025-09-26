
<div>
    <x-modal
        id="modal-establo"
        title="Crear establo"
    >

        <form class="grid grid-cols-1 gap-5">

            <div>
                <x-form.input wire:model="nombre" label="Nombre"/>
                <x-error-message> @error('nombre') {{ $message }} @enderror </x-error-message>
            </div>


            <div>
                <x-form.input wire:model="descripcion" label="Descripcion" />
                <x-error-message> @error('descripcion') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.select wire:model="estado" label="Estado"
                    :options="[
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo'
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
