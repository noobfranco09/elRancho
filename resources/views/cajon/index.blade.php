<x-app-layout>

    <x-slot name="header">
        <x-header title="Gestión de cajones" description="Sección para la gestión de cajones"/>
    </x-slot>

    <x-panel class="mb-9">
        <x-button @click="$dispatch('openModal', { component: 'cajon.modal' })">
            Crear cajon
        </x-button>
        <x-button variant="blue" @click="$dispatch('openModal', { component: 'cajon.asignar-animales' })">
            Asignar Animales
        </x-button>
    </x-panel>

    <x-panel>
        <livewire:cajon.table/>
    </x-panel>

     <script>
        document.addEventListener("cajonEditado", () =>{
            Toast.fire({
                icon: "success",
                title: "Animal actualizado con éxito"
            })
        })

        document.addEventListener("capacidadError", () =>{
            Toast.fire({
                icon: "error",
                title: "La capacidad del establo seleccionado ya no puede ser vinculado a mas cajones"
            })
        })

        document.addEventListener("cajonCreado", () =>{
            Toast.fire({
                icon: "success",
                title: "Establo creado con éxito"
            })
        })

        document.addEventListener("cajonEliminado", () =>{
            Toast.fire({
                icon: "success",
                title: "Establo desactivado con éxito"
            })
        })
    </script>
 
</x-app-layout>
