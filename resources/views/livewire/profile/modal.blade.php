<x-modal id="1" title="Eliminar Cuenta" name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('¿Estás seguro de que deseas eliminar tu cuenta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Una vez que se elimine tu cuenta, todos sus recursos y datos se eliminarán de forma permanente. Introduce tu contraseña para confirmar que deseas eliminar tu cuenta de forma permanente.') }}
            </p>

            <div class="mt-6">

                <x-form.input
                    label="Confirmar Contraseña"
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-error-message :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-button>

                <x-button type="submit" variant="danger" class="ms-3">
                    {{ __('Eliminar') }}
                </x-button>
            </div>
        </form>
    </x-modal>
