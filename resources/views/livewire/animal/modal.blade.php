<div>
    <x-modal
        id="modal-animal"
        title="Crear animal"
        action="#"
        method="POST"
        maxWidth="2xl"
    >

        <form id="form-animal" class="grid grid-cols-2 gap-6">
            <div>
                <x-form.input wire:model.live="nombre" label="Nombre"   required />
                <x-error-message> @error('nombre') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model.live="codigo" label="Codigo"   required />
                <x-error-message> @error('codigo') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input type="number" wire:model.live="precio" label="Precio"   required />
                <x-error-message> @error('precio') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.select wire:model.live="sexo" label="Sexo"
                    value="1"
                    :options="[
                        'M' => 'Macho',
                        'F' => 'Hembra'
                    ]"
                    required
                    />
                    <x-error-message> @error('sexo') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.select wire:model="especie_id" label="Especie"
                    :options="['' => 'Seleccionar una especie'] + $especies"
                    required
                    />
                    <x-error-message> @error('especie_id') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model.live="color" label="Color"   required />
                <x-error-message> @error('color') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model.live="marcas" label="Marcas"   required />
                <x-error-message> @error('marcas') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input type="date" wire:model.live="fecha_nacimiento" label="Fecha de nacimiento"   required />
                <x-error-message> @error('fecha_nacimiento') {{ $message }} @enderror </x-error-message>
            </div>


            <div>
                <x-form.select wire:model.live="estado" label="Estado"
                    value="1"
                    :options="[
                        '1' => 'Activo',
                        '0' => 'Inactivo'
                    ]"
                    required
                    />
                    <x-error-message> @error('estado') {{ $message }} @enderror </x-error-message>
            </div>
        </form>

        <x-form.file-input
            label="Subir imagen"
            max-size="5"
            wire:model="imagen"
            errorKey="imagen"
            accept="image/*"
            helper="Formatos: JPG, PNG, GIF"
            showPreview="true"
        />


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
