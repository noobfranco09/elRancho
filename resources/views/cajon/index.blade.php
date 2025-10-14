<x-app-layout>

    <x-slot name="header">
        <x-header title="Gestión de cajones" description="Sección para la gestión de cajones"/>
    </x-slot>

    <x-panel class="mb-9">
        <x-button @click="$dispatch('openModal', { component: 'cajon.modal' })">
            Crear cajon
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
                title: "La cantidad total de los cajones supera la capacidad del establo."
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
