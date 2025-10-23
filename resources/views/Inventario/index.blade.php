<x-app-layout>
    <x-slot name="header">
        <x-header title="Gestion de Inventario" description="Seccion para gestionar el inventario" />
    </x-slot>
    <x-panel class="mb-5">
        <x-button @click="$dispatch('openModal',{component:'inventario.modal'})">
            Crear Inventario
        </x-button>
    </x-panel>
    <x-panel>
        <livewire:inventario.table />
    </x-panel>
    <script>
        document.addEventListener("inventarioCreado", () => {
            Toast.fire({
                icon: "success",
                title: "Inventario creado con éxito",
            })
        })
            document.addEventListener("inventarioEditado", () => {
            Toast.fire({
                icon: "success",
                title: "Inventario editado con éxito",
            })
        })
    </script>

</x-app-layout>