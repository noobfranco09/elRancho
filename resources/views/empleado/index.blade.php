<x-app-layout>

    <x-slot name="header">
        <x-header title="Gestión de empleados" description="Sección para la gestión de empleados"/>
    </x-slot>

    <x-panel class="mb-9">
        <x-button @click="$dispatch('openModal', { component: 'empleado.modal' })">
            Crear empleado
        </x-button>
    </x-panel>

    <x-panel>
        <livewire:empleado.table/>
    </x-panel>

     <script>
        document.addEventListener("empleadoEditado", () =>{
            Toast.fire({
                icon: "success",
                title: "Animal actualizado con éxito"
            })
        })

        document.addEventListener("empleadoCreado", () =>{
            Toast.fire({
                icon: "success",
                title: "Establo creado con éxito"
            })
        })

        document.addEventListener("empleadoEliminado", () =>{
            Toast.fire({
                icon: "success",
                title: "Establo desactivado con éxito"
            })
        })
    </script>
 
</x-app-layout>
