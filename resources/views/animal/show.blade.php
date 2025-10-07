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
                            <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">Max</h2>
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
                        <x-info-card icon="pets" label="Especie" value="Canino"/>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 border border-gray-100 dark:border-gray-600 hover:scale-105 transition-transform duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-1 flex items-center gap-1.5">
                                <i class="fas fa-birthday-cake text-pink-500"></i>
                                Edad
                            </dt>
                            <dd class="text-lg font-bold text-gray-900 dark:text-white">3 años</dd>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 border border-gray-100 dark:border-gray-600 hover:scale-105 transition-transform duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-1 flex items-center gap-1.5">
                                <i class="fas fa-weight text-purple-500"></i>
                                Peso
                            </dt>
                            <dd class="text-lg font-bold text-gray-900 dark:text-white">32 kg</dd>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 border border-gray-100 dark:border-gray-600 hover:scale-105 transition-transform duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-1 flex items-center gap-1.5">
                                <i class="fas fa-venus-mars text-indigo-500"></i>
                                Sexo
                            </dt>
                            <dd class="text-lg font-bold text-gray-900 dark:text-white">Macho</dd>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 border border-gray-100 dark:border-gray-600 hover:scale-105 transition-transform duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-1 flex items-center gap-1.5">
                                <i class="fas fa-palette text-amber-500"></i>
                                Color
                            </dt>
                            <dd class="text-lg font-bold text-gray-900 dark:text-white">Dorado</dd>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 border border-gray-100 dark:border-gray-600 hover:scale-105 transition-transform duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-1 flex items-center gap-1.5">
                                <i class="fas fa-user text-green-500"></i>
                                Propietario
                            </dt>
                            <dd class="text-lg font-bold text-gray-900 dark:text-white">Juan Pérez</dd>
                        </div>
                    </div>

                    <!-- Sección de Acciones Mejorada -->
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Acciones Rápidas</p>

                        <!-- Grid de botones de acción -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                            <button class="flex flex-col items-center justify-center gap-2 p-4 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/40 rounded-xl border border-blue-200 dark:border-blue-800 transition-all hover:-translate-y-0.5">
                                <i class="fas fa-edit text-xl"></i>
                                <span class="text-xs font-medium">Editar</span>
                            </button>

                            <button class="flex flex-col items-center justify-center gap-2 p-4 bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400 hover:bg-purple-100 dark:hover:bg-purple-900/40 rounded-xl border border-purple-200 dark:border-purple-800 transition-all hover:-translate-y-0.5">
                                <i class="fas fa-history text-xl"></i>
                                <span class="text-xs font-medium">Historial</span>
                            </button>

                            <button class="flex flex-col items-center justify-center gap-2 p-4 bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 hover:bg-green-100 dark:hover:bg-green-900/40 rounded-xl border border-green-200 dark:border-green-800 transition-all hover:-translate-y-0.5">
                                <i class="fas fa-stethoscope text-xl"></i>
                                <span class="text-xs font-medium">Nueva cita</span>
                            </button>

                            <button class="flex flex-col items-center justify-center gap-2 p-4 bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-900/40 rounded-xl border border-amber-200 dark:border-amber-800 transition-all hover:-translate-y-0.5">
                                <i class="fas fa-syringe text-xl"></i>
                                <span class="text-xs font-medium">Vacunas</span>
                            </button>

                            <button class="flex flex-col items-center justify-center gap-2 p-4 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/40 rounded-xl border border-red-200 dark:border-red-800 transition-all hover:-translate-y-0.5">
                                <i class="fas fa-pills text-xl"></i>
                                <span class="text-xs font-medium">Medicinas</span>
                            </button>

                            <button class="flex flex-col items-center justify-center gap-2 p-4 bg-teal-50 dark:bg-teal-900/20 text-teal-600 dark:text-teal-400 hover:bg-teal-100 dark:hover:bg-teal-900/40 rounded-xl border border-teal-200 dark:border-teal-800 transition-all hover:-translate-y-0.5">
                                <i class="fas fa-file-medical text-xl"></i>
                                <span class="text-xs font-medium">Reportes</span>
                            </button>

                            <button class="flex flex-col items-center justify-center gap-2 p-4 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-indigo-900/40 rounded-xl border border-indigo-200 dark:border-indigo-800 transition-all hover:-translate-y-0.5">
                                <i class="fas fa-share-alt text-xl"></i>
                                <span class="text-xs font-medium">Compartir</span>
                            </button>

                            <!-- Botón de más opciones con dropdown -->
                            <div class="relative" @click.away="dropdownOpen = false">
                                <button
                                    @click="dropdownOpen = !dropdownOpen"
                                    class="flex flex-col items-center justify-center gap-2 p-4 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-xl border border-gray-300 dark:border-gray-600 transition-all hover:-translate-y-0.5 w-full">
                                    <i class="fas fa-ellipsis-h text-xl"></i>
                                    <span class="text-xs font-medium">Más</span>
                                </button>

                                <!-- Dropdown menu -->
                                <div
                                    x-show="dropdownOpen"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 -translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-2"
                                    class="absolute bottom-full right-0 mb-2 w-56 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-200 dark:border-gray-700 z-10"
                                    style="display: none;">
                                    <div class="p-2">
                                        <button class="w-full text-left px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-sm text-gray-700 dark:text-gray-300 flex items-center gap-3 transition-colors">
                                            <i class="fas fa-download text-gray-400"></i>
                                            Exportar datos
                                        </button>
                                        <button class="w-full text-left px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-sm text-gray-700 dark:text-gray-300 flex items-center gap-3 transition-colors">
                                            <i class="fas fa-print text-gray-400"></i>
                                            Imprimir perfil
                                        </button>
                                        <button class="w-full text-left px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-sm text-gray-700 dark:text-gray-300 flex items-center gap-3 transition-colors">
                                            <i class="fas fa-bell text-gray-400"></i>
                                            Recordatorios
                                        </button>
                                        <button class="w-full text-left px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-sm text-gray-700 dark:text-gray-300 flex items-center gap-3 transition-colors">
                                            <i class="fas fa-chart-line text-gray-400"></i>
                                            Estadísticas
                                        </button>
                                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                                        <button class="w-full text-left px-4 py-2.5 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg text-sm text-red-600 dark:text-red-400 flex items-center gap-3 transition-colors">
                                            <i class="fas fa-trash text-red-500"></i>
                                            Eliminar perfil
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
