
<x-app-layout>
    <x-slot name="header">
        <x-header title="Información del animal" description=""/>
    </x-slot>

    <div class="max-w-5xl mx-auto" x-data="{ isFavorite: false }">
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-xl overflow-hidden p-8">

            <!-- Contenedor principal -->
            <div class="flex flex-col lg:flex-row items-center lg:items-start gap-8 mb-10">

                <!-- Columna izquierda (foto + nombre + raza) -->
                <div class="flex flex-col items-center lg:items-start text-center lg:text-left gap-4">

                    <!-- Imagen redonda -->
                    <div class="relative group">
                        <img
                            class="w-48 h-48 object-cover rounded-2xl border-4 border-gray-300 dark:border-gray-600 shadow-lg"
                            src="{{ $animal->imagen ? asset('storage/'.$animal->imagen) : asset('storage/default.jpg')}}"
                            alt="{{ $animal->nombre }}"
                        >

                        <!-- Overlay cambiar foto -->
                        <div class="absolute inset-0 bg-black/40 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <button class="text-white bg-white/20 backdrop-blur-sm hover:bg-white/30 font-medium rounded-full text-sm px-4 py-2 flex items-center gap-2 transition-colors duration-300">
                                <i class="fas fa-camera"></i>
                                Cambiar foto
                            </button>
                        </div>

                        <!-- Estado -->
                        <div class="absolute bottom-2 right-2">
                            <span class="bg-green-500 text-white text-xs font-bold px-2.5 py-1 rounded-full shadow">
                                Activo
                            </span>
                        </div>
                    </div>

                    <!-- Nombre, raza y favorito -->
                    <div class="w-full flex flex-col items-center lg:items-start">
                        <div class="flex justify-between items-start w-full">
                            <div>
                                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-1">
                                    {{ $animal->nombre }}
                                </h2>
                                <p class="text-lg text-gray-600 dark:text-gray-400 flex items-center gap-2">
                                    <i class="fas fa-paw text-amber-500"></i>
                                    Golden Retriever
                                </p>
                            </div>
                            <button
                                @click="isFavorite = !isFavorite"
                                class="text-2xl transition-colors duration-300"
                                :class="isFavorite ? 'text-red-500' : 'text-gray-400 hover:text-red-500'">
                                <i :class="isFavorite ? 'fas fa-heart' : 'far fa-heart'"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Columna derecha (info general) -->
                <div class="flex-1 w-full">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <x-info-card icon="pets" iconClass="text-blue-500" label="Especie" value="Canino" />
                        <x-info-card icon="cake" iconClass="text-pink-500" label="Edad" value="3 años" />
                        <x-info-card icon="fitness_center" iconClass="text-purple-500" label="Peso" value="32 kg" />
                        <x-info-card icon="transgender" iconClass="text-indigo-500" label="Sexo" value="Macho" />
                        <x-info-card icon="palette" iconClass="text-amber-500" label="Color" value="Dorado" />
                        <x-info-card icon="person" iconClass="text-green-500" label="Propietario" value="Juan Pérez" />
                    </div>
                </div>
            </div>

            <!-- Acciones -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Acciones Rápidas</p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <x-action-button icon="edit" label="Editar" color="blue" />
                    <x-action-button icon="history" label="Historial" color="purple" />
                    <x-action-button icon="stethoscope" label="Nueva cita" color="green" />
                    <x-action-button icon="vaccines" label="Vacunas" color="amber" />
                    <x-action-button icon="medication" label="Medicinas" color="red" />
                    <x-action-button icon="description" label="Reportes" color="teal" />
                    <x-action-button icon="share" label="Compartir" color="indigo" />

                    <!-- Menú desplegable -->
                    <x-dropdown.menu label="Más" icon="more_horiz">
                        <x-dropdown.item icon="download">Exportar datos</x-dropdown.item>
                        <x-dropdown.item icon="print">Imprimir perfil</x-dropdown.item>
                        <x-dropdown.item icon="notifications">Recordatorios</x-dropdown.item>
                        <x-dropdown.item icon="query_stats">Estadísticas</x-dropdown.item>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <x-dropdown.item
                            icon="delete"
                            class="text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20"
                        >
                            Eliminar perfil
                        </x-dropdown.item>
                    </x-dropdown.menu>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
