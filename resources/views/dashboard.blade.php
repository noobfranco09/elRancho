<x-app-layout>
    <x-slot name="header">
        <x-header title="Dashboard" description="Gestión del rancho y animales"/>
    </x-slot>

    <div class="flex flex-col lg:flex-row gap-6 w-full">
        {{-- Panel de Ventas --}}
        <x-panel class="flex-1">
            {{-- Quitamos 'max-w-6xl mx-auto' para que el panel use el ancho disponible --}}
            <div>
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Ventas</h2>
                    <p class="text-gray-600 mt-1">Accede a las acciones de ventas.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-action
                        icon="add_shopping_cart"
                        label="Registrar venta"
                        description="Registrar una nueva venta de animal."
                        color="green"
                        :href="route('clientes.create')"
                    />

                    <x-action
                        icon="list_alt"
                        label="Consultar ventas"
                        description="Ver las ventas registradas."
                        color="blue"
                        :href="route('venta.index')"
                    />
                </div>
            </div>
        </x-panel>

        {{-- Panel de Alquileres --}}
        <!--
        <x-panel class="flex-1">
            {{-- Quitamos 'max-w-6xl mx-auto' --}}
            <div>
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Alquileres</h2>
                    <p class="text-gray-600 mt-1">Accede a las acciones de alquileres.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-action
                        icon="note_add"
                        label="Registrar alquiler"
                        description="Registrar un nuevo alquiler de animal"
                        color="purple"
                    />

                    <x-action
                        icon="receipt_long"
                        label="Consultar alquileres"
                        description="Ver los alquileres registrados."
                        color="orange"
                    />
                </div>
            </div>
        </x-panel>
        -->
    </div>


</x-app-layout>
