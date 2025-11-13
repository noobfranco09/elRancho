<x-app-layout>
    <x-slot name="header">
        <x-header title="Gestion de vacunas" description="Seccion para gestionar vacunas"/>
    </x-slot>

    <x-panel class="mb-9">
        <x-button @click="$dispatch('openModal', { component: 'vacuna.modal' })">
            Crear vacuna
        </x-button>
    </x-panel>

    <x-panel>
        <livewire:vacuna.table/>
    </x-panel>

    <script>
        // este sera el evento que se escucha cuando se edite
        document.addEventListener("vacunaEditada", () =>{
            Toast.fire({
                icon: "success",
                title: "Animal actualizado con éxito"
            })
        })

        document.addEventListener("vacunaCreada", () =>{
            Toast.fire({
                icon: "success",
                title: "Vacuna creada con éxito"
            })
        })

        document.addEventListener("vacunaEliminada", () =>{
            Toast.fire({
                icon: "success",
                title: "Vacuna eliminada con éxito"
            })
        })
    </script>
</x-app-layout>
