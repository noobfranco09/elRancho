<x-app-layout>
    <x-slot name="header">
        <x-header title="Registro de venta" description="Información del cliente"/>
    </x-slot>

    <!--Aqui iria el contenido, se pueden crear mas paneles si es necesario-->
    <x-panel>
        <form method="POST" class="space-y-6">
            <!-- Nombre completo -->
            <div>
                <x-form.input wire:model.live="nombre" icon="person" value="{{ $cliente->nombre ?? null}}" label="Nombre"/>
                <x-error-message> @error('nombre') {{ $message }} @enderror </x-error-message>
            </div>

            <!-- Cédula y Teléfono en grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Cédula -->
                <div>
                    <x-form.input wire:model.live="cedula" value="{{ $cliente->cedula ?? null }}" icon="badge" type="number" label="Cédula"/>
                    <x-error-message> @error('nombre') {{ $message }} @enderror </x-error-message>
                </div>

                <!-- Teléfono -->
                <div>
                    <x-form.input wire:model.live="telefono" value="{{ $cliente->telefono ?? null }}" icon="phone" type="number" label="Teléfono"/>
                    <x-error-message> @error('telefono') {{ $message }} @enderror </x-error-message>
                </div>
            </div>

            <!-- Correo electrónico -->
            <div>
                <x-form.input wire:model.live="correo" icon="mail_outline" value="{{ $cliente->correo ?? null}}" type="email" label="Correo"/>
                <x-error-message> @error('correo') {{ $message }} @enderror </x-error-message>
            </div>

            <!-- Dirección -->
            <div>
                <x-form.textarea wire:model.live="direccion" value="{{ $cliente->direccion ?? null }}" label="Dirección" rows="3"/>
                <x-error-message> @error('direccion') {{ $message }} @enderror </x-error-message>
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                <x-button variant="secondary">
                    Cancelar
                </x-button>

                <x-button>
                    Continuar
                </x-button>
            </div>
        </form>
    </x-panel>

</x-app-layout>
