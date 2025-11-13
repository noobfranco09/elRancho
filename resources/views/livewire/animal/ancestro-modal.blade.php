
<div>
    <x-modal
        id="modal-ancestros"
        title="Asignar padres"
    >

        <form class="grid grid-cols-1 gap-5">
            <div>
                <x-form.select wire:model.live="padre" label="Vacuna"
                    :options="['' => 'Seleccionar un animal'] + $animales"
                    />
                    <x-error-message> @error('padre') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.select wire:model.live="madre" label="Vacuna"
                    :options="['' => 'Seleccionar un animal'] + $animales"
                    />
                    <x-error-message> @error('madre') {{ $message }} @enderror </x-error-message>
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
