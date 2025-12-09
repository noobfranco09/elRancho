<div>
    <x-modal
        id="modal-enfermedad"
        title="Registrar enfermedad"
    >

        <form class="grid grid-cols-1 gap-5">
            <div>
                <x-form.input type="date" wire:model.live="fecha"  label="Fecha"/>
                <x-error-message> @error('fecha') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.textarea wire:model.live="descripcion" label="Descripción de la enfermedad" rows="3"/>
                <x-error-message> @error('descripcion') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.select wire:model="estado"  label="Estado"
                    :options="[
                        '' => 'Seleccione el estado de la enfermedad',
                        'Leve' => 'Leve',
                        'Grave' => 'Grave'
                    ]"
                    />
                    <x-error-message> @error('estado') {{ $message }} @enderror </x-error-message>
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
