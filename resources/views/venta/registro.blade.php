<x-app-layout>

    <x-slot name="header">
        <x-header title="Registro de venta" description="Selección de animales"/>
    </x-slot>

    <livewire:venta.tablero-animales :cliente="$cliente" />

    <script>
        document.addEventListener("error", (event) => {
            const message = event.detail.message;

            Toast.fire({
                icon: "error",
                title: message
            })
        })

        document.addEventListener("ventaRegistrada", (event) => {
            const message = event.detail.message;

            Toast.fire({
                icon: "success",
                title: message
            })
        })
    </script>

</x-app-layout>
