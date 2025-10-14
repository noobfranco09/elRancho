<x-app-layout>

    <x-slot name="header">
        <x-header title="Gestión de clientes" description="Sección para la gestión de clientes"/>
    </x-slot>

    <x-panel class="mb-9">
        <x-button @click="$dispatch('openModal', { component: 'cliente.modal' })">
            Crear cliente
        </x-button>
    </x-panel>

    <x-panel>
        <livewire:cliente.table/>
    </x-panel>

     <script>
        document.addEventListener("clienteEditado", () =>{
            Toast.fire({
                icon: "success",
                title: "Animal actualizado con éxito"
            })
        })

        document.addEventListener("clienteCreado", () =>{
            Toast.fire({
                icon: "success",
                title: "Establo creado con éxito"
            })
        })

        document.addEventListener("clienteEliminado", () =>{
            Toast.fire({
                icon: "success",
                title: "Establo desactivado con éxito"
            })
        })
    </script>
 
</x-app-layout>
