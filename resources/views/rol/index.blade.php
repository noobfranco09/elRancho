<x-app-layout>

    <x-slot name="header">
        <x-header title="Gestión de roles" description="Sección para la gestión de roles"/>
    </x-slot>

    <x-panel class="mb-9">
        <x-button @click="$dispatch('openModal', { component: 'rol.modal' })">
            Crear rol
        </x-button>
    </x-panel>

    <x-panel>
        <livewire:rol.table/>
    </x-panel>

     <script>
        document.addEventListener("rolEditado", () =>{
            Toast.fire({
                icon: "success",
                title: "Animal actualizado con éxito"
            })
        })

        document.addEventListener("rolCreado", () =>{
            Toast.fire({
                icon: "success",
                title: "Establo creado con éxito"
            })
        })

        document.addEventListener("rolEliminado", () =>{
            Toast.fire({
                icon: "success",
                title: "Establo desactivado con éxito"
            })
        })
    </script>
 
</x-app-layout>
