<div>
    <x-modal
        id="modal-empleado"
        title="Crear empleado"
    >

        <form class="grid grid-cols-1 gap-5">

            <div>
                <x-form.input wire:model="name" label="Nombre"/>
                <x-error-message> @error('name') {{ $message }} @enderror </x-error-message>
            </div>


            <div>
                <x-form.input type="password" wire:model="password" label="Contraseña" />
                <x-error-message> @error('password') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input type="date" wire:model="fecha_nacimiento" label="Fecha de nacimiento" />
                <x-error-message> @error('fecha_nacimiento') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input type="number" wire:model="telefono" label="Telefono" />
                <x-error-message> @error('telefono') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input type="email" wire:model="email" label="Correo Electronico" />
                <x-error-message> @error('email') {{ $message }} @enderror </x-error-message>
            </div>
            
            <div>
                <x-form.input wire:model="direccion" label="Direccion"/>
                <x-error-message> @error('direccion') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.select wire:model="rol_id" label="Rol"
                    :options="['' => 'Seleccione un rol'] + $roles"
                    required
                    />
                <x-error-message> @error('rol_id') {{ $message }} @enderror </x-error-message>
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
