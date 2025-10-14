<div>
    <x-modal
        id="modal-vacunacion"
        title="Registrar vacunación"
    >

        <form class="grid grid-cols-1 gap-5">
            <div>
                <x-form.input type="date" wire:model.live="fecha"  label="Fecha de vacunación"/>
                <x-error-message> @error('fecha') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.select wire:model="vacunaId" label="Vacuna"
                    :options="['' => 'Seleccionar una vacuna'] + $vacunas"
                    />
                    <x-error-message> @error('vacuna_id') {{ $message }} @enderror </x-error-message>
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
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>
