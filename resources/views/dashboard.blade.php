<x-app-layout>
    <x-slot name="header">
        <x-header title="Dashboard" description="Gestión del rancho y animales"/>
    </x-slot>

    <x-panel>

   <!-- Acción 7: Análisis -->
 <div x-data="quickActionsPanel()" class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Acciones Rápidas</h2>
            <p class="text-gray-600 mt-1">Accede rápidamente a las funciones más utilizadas</p>
        </div>

        <!-- Panel de Acciones -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Acción 1: Nuevo Usuario -->
            <x-action
                icon="person_add"
                label="Nuevo Usuario"
                description="Registrar un nuevo usuario en el sistema"
                shortcut="CTRL+N"
                color="blue"
            />

            <x-action
                icon="summarize"
                label="Generar Reporte"
                description="Crear reportes y análisis de datos"
                shortcut="CTRL+R"
                color="green"
            />

            <x-action
                icon="shopping_bag"
                label="Nueva Orden"
                description="Crear una nueva orden de compra"
                shortcut="CTRL+O"
                color="purple"
            />

            <x-action
                icon="mail"
                label="Mensajes"
                description="Ver mensajes y notificaciones"
                shortcut="CTRL+M"
                color="orange"
            />

            <x-action
                icon="inventory_2"
                label="Inventario"
                description="Gestionar productos y stock"
                shortcut="CTRL+I"
                color="indigo"
            />

            <x-action
                icon="settings"
                label="Configuración"
                description="Ajustes del sistema"
                shortcut="CTRL+,"
                color="gray"
            />

            <x-action
                icon="analytics"
                label="Análisis"
                description="Dashboard y métricas clave"
                shortcut="CTRL+A"
                color="teal"
            />

            <x-action
                icon="support_agent"
                label="Soporte"
                description="Ayuda y asistencia técnica"
                shortcut="F1"
                color="rose"
            />

        </div>
    </div>
    </x-panel>


</x-app-layout>
