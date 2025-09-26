<x-app-layout>
    <x-slot name="header">
        <x-header title="Gestion de veterinarios" description="Seccion para gestionar veterinarios" />
    </x-slot>
    <x-panel class="mb-5">
        <x-button @click="$dispatch('openModal',{component:'Veterinario.modal'})">
            Crear Veterinario
        </x-button>
    </x-panel>
    <x-panel>
        <livewire:veterinario.table />
    </x-panel>
    <script>
        document.addEventListener("veterinarioCreado", () => {
            Toast.fire({
                icon: "success",
                title: "Veterinario creado con éxito",
            })
        })
                document.addEventListener("veterinarioEditado", () => {
            Toast.fire({
                icon: "success",
                title: "Veterinario editado con éxito",
            })
        })
    </script>

</x-app-layout>