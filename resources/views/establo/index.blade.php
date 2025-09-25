<x-app-layout>

    <x-slot name="header">
        <x-header title="Gestión de establos" description="Sección para la gestión de establos"/>
    </x-slot>

    <x-panel class="mb-9">
        <x-button @click="$dispatch('openModal', { component: 'establo.modal' })">
            Crear establo
        </x-button>
    </x-panel>

    <x-panel>
        <livewire:establo.table/>
    </x-panel>

     <script>
        document.addEventListener("establoEditado", () =>{
            Toast.fire({
                icon: "success",
                title: "Animal actualizado con éxito"
            })
        })

        document.addEventListener("establoCreado", () =>{
            Toast.fire({
                icon: "success",
                title: "Establo creado con éxito"
            })
        })
    </script>
 
</x-app-layout>
