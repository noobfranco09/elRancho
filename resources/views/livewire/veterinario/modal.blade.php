<div>
    <x-modal id="modal-veterinario" title="Crear veterinario">

        <form class="grid grid-cols-1 gap-5">

            <div>
                <x-form.input wire:model.live="nombre" label="Nombre" />
                <x-error-message> @error('nombre') {{ $message }} @enderror </x-error-message>
            </div>


            <div>
                <x-form.input wire:model.live="cedula" label="Cédula" type="number" />
                <x-error-message> @error('cedula') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model.live="telefono" label="Teléfono" type="number" />
                <x-error-message> @error('telefono') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model.live="correo" label="Correo" type="email"/>
                <x-error-message> @error('correo') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model.live="especialidad" label="Especialidad" />
                <x-error-message> @error('especialidad') {{ $message }} @enderror </x-error-message>
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