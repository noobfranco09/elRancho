<div>
    <x-modal
        id="modal-cliente"
        title="Crear cliente"
    >

        <form class="grid grid-cols-1 gap-5">

            <div>
                <x-form.input wire:model.live="nombre" label="Nombre"/>
                <x-error-message> @error('nombre') {{ $message }} @enderror </x-error-message>
            </div>


            <div>
                <x-form.input type="number" wire:model.live="cedula" label="Cedula" />
                <x-error-message> @error('cedula') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input type="text" wire:model.live="telefono" label="Telefono" />
                <x-error-message> @error('telefono') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input type="email" wire:model.live="correo" label="Correo Electronico" />
                <x-error-message> @error('correo') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model.live="direccion" label="Direccion"/>
                <x-error-message> @error('direccion') {{ $message }} @enderror </x-error-message>
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
