<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Eliminar Cuenta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Una vez que elimines tu cuenta, todos tus datos y recursos se borrarán de forma permanente. Antes de continuar, asegúrate de haber descargado cualquier información que quieras conservar.') }}
        </p>
    </header>
    <x-button
    variant="danger"
        x-data=""
        @click="$dispatch('openModal',{component:'profile.modal'})"
    >{{ __('Eliminar Cuenta') }}</x-button>
    
</section>
