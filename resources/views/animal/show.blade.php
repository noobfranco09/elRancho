<x-app-layout>
    <x-slot name="header">
        <x-header title="Información del animal" description=""/>
    </x-slot>
    <div class="max-w-6xl mx-auto" x-data="{ dropdownOpen: false, isFavorite: false }">
        <!-- Card Principal del Animal -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-lg dark:bg-gray-800 dark:border-gray-700 overflow-hidden mb-6 hover:shadow-xl transition-shadow duration-300">
            <div class="flex flex-col lg:flex-row">
                <!-- Imagen del Animal con Overlay -->
                <div class="lg:w-1/3 relative group">
                    <img class="w-full h-80 lg:h-full object-cover" src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?w=400" alt="Max">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <button class="text-white bg-white/20 backdrop-blur-sm hover:bg-white/30 font-medium rounded-lg text-sm px-4 py-2 flex items-center gap-2 transition-colors duration-300">
                            <i class="fas fa-camera"></i>
                            Cambiar foto
                        </button>
                    </div>
                    <!-- Badge flotante de estado -->
                    <div class="absolute top-4 right-4">
                        <span class="bg-green-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5">
                            <i class="fas fa-circle text-xs animate-pulse"></i>
                            Activo
                        </span>
                    </div>
                </div>

                <!-- Información del Animal -->
                <div class="lg:w-2/3 p-6 lg:p-8">
                    <!-- Header con nombre -->
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">{{ $animal->nombre }}</h2>
                            <p class="text-xl text-gray-600 dark:text-gray-400 flex items-center gap-2">
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

                    <!-- Grid de Información con iconos -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">

                        <!-- Especie -->
                        <x-info-card
                            icon="pets"
                            iconClass="text-blue-500"
                            label="Especie"
                            value="Canino"
                        />

                        <!-- Edad -->
                        <x-info-card
                            icon="cake"
                            iconClass="text-pink-500"
                            label="Edad"
                            value="3 años"
                        />

                        <!-- Peso -->
                        <x-info-card
                            icon="fitness_center"
                            iconClass="text-purple-500"
                            label="Peso"
                            value="32 kg"
                        />

                        <!-- Sexo -->
                        <x-info-card
                            icon="transgender"
                            iconClass="text-indigo-500"
                            label="Sexo"
                            value="Macho"
                        />

                        <!-- Color -->
                        <x-info-card
                            icon="palette"
                            iconClass="text-amber-500"
                            label="Color"
                            value="Dorado"
                        />

                        <!-- Propietario -->
                        <x-info-card
                            icon="person"
                            iconClass="text-green-500"
                            label="Propietario"
                            value="Juan Pérez"
                        />
                    </div>

                    <!-- Sección de Acciones Mejorada -->
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Acciones Rápidas</p>

                        <!-- Grid de botones de acción -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                            <!-- Editar -->
                            <x-action-button
                                icon="edit"
                                label="Editar"
                                color="blue"
                            />

                            <!-- Historial -->
                            <x-action-button
                                icon="history"
                                label="Historial"
                                color="purple"
                            />

                            <!-- Nueva cita -->
                            <x-action-button
                                icon="stethoscope"
                                label="Nueva cita"
                                color="green"
                            />

                            <!-- Vacunas -->
                            <x-action-button
                                icon="vaccines"
                                label="Vacunas"
                                color="amber"
                            />

                            <!-- Medicinas -->
                            <x-action-button
                                icon="medication"
                                label="Medicinas"
                                color="red"
                            />

                            <!-- Reportes -->
                            <x-action-button
                                icon="description"
                                label="Reportes"
                                color="teal"
                            />

                            <!-- Compartir -->
                            <x-action-button
                                icon="share"
                                label="Compartir"
                                color="indigo"
                            />

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
        </div>
    </div>

</x-app-layout>
