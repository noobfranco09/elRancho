<x-panel>
    <form  class="space-y-6">
        <div class="mb-3">
            <livewire:cliente.search-input />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-form.input wire:model.live="nombre" icon="badge" label="Nombre"/>
                <x-error-message> @error('nombre') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model.live="telefono" icon="phone" label="Teléfono"/>
                <x-error-message> @error('telefono') {{ $message }} @enderror </x-error-message>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <x-form.input wire:model.live="correo" icon="mail_outline" type="email" label="Correo"/>
                <x-error-message> @error('correo') {{ $message }} @enderror </x-error-message>
            </div>

            <div>
                <x-form.input wire:model.live="direccion" icon="pin_drop" label="Dirección"/>
                <x-error-message> @error('direccion') {{ $message }} @enderror </x-error-message>
            </div>
        </div>


        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
            <x-button variant="secondary">
                Cancelar
            </x-button>

            <x-button type="button" wire:click="save">
                Continuar
            </x-button>
        </div>
    </form>
</x-panel>
