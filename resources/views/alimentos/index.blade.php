<x-app-layout>
    <x-slot name="header">
        <x-header title="Gestion de Alimentos" description="Seccion para gestionar los alimentos" />
    </x-slot>
    <x-panel class="mb-5">
        <x-button @click="$dispatch('openModal',{component:'alimentos.modal'})">
            Crear Alimento
        </x-button>
    </x-panel>
    <x-panel>
        <livewire:alimentos.table />
    </x-panel>
    <script>
        document.addEventListener("alimentoCreado", () => {
            Toast.fire({
                icon: "success",
                title: "Alimento creado con éxito",
            })
        })
            document.addEventListener("alimentoEditado", () => {
            Toast.fire({
                icon: "success",
                title: "Alimento editado con éxito",
            })
        })
    </script>

</x-app-layout>