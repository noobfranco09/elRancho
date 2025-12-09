<x-app-layout>
    <x-slot name="header">
        <x-header title="Ventas" description="Gestión de ventas"/>
    </x-slot>

    <x-panel class="mb-9">
        <x-button icon="print" :href="route('ventas.pdf')">
            Generar PDF
        </x-button>
    </x-panel>

    <x-panel>
        <livewire:venta.table />
    </x-panel>

    <<script>

        document.addEventListener("success", (e) =>{
            const message = event.detail.message;

            Toast.fire({
                icon: "success",
                title: message
            })
        })
    </script>

</x-app-layout>
