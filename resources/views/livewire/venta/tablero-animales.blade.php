<div x-data="{ searchQuery: '', activeTab: 'Cerdos', selectedAnimals: [] }" x-cloak class="container mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Sección Izquierda: Lista de Animales -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
            <div class="mb-4">
                <label for="search" class="sr-only">Buscar animal</label>

                <div class="relative">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <span class="material-symbols-outlined shrink-0 text-lg">
                                search
                            </span>
                        </div>
                        <x-form.input label="nombre" icon="search"/>
                    </div>
                </div>

            </div>

            <!-- Tabs de Especies -->
            <div class="mb-6 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            @click="activeTab = 'Cerdos'"
                            :class="activeTab === 'Cerdos' ? 'text-primary-600 border-primary-600' : 'text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300'"
                            class="inline-block p-4 border-b-2 rounded-t-lg transition-colors"
                            type="button">
                            Cerdos
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            @click="activeTab = 'Pollos'"
                            :class="activeTab === 'Pollos' ? 'text-primary-600 border-primary-600' : 'text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300'"
                            class="inline-block p-4 border-b-2 rounded-t-lg transition-colors"
                            type="button">
                            Pollos
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            @click="activeTab = 'Vacas'"
                            :class="activeTab === 'Vacas' ? 'text-primary-600 border-primary-600' : 'text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300'"
                            class="inline-block p-4 border-b-2 rounded-t-lg transition-colors"
                            type="button">
                            Vacas
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Grid de Animales - Aquí cargarás los datos con Livewire -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-h-[600px] overflow-y-auto pr-2">
                <!-- Ejemplo de card - Repetir con Livewire -->
                <div
                    @click="selectedAnimals.push({ id: 1, name: 'Animal Ejemplo', price: 250000, image: 'https://images.unsplash.com/photo-1516467508483-a7212febe31a?w=400&h=300&fit=crop' })"
                    class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition-shadow cursor-pointer hover:border-blue-300">
                    <img
                        src="https://images.unsplash.com/photo-1516467508483-a7212febe31a?w=400&h=300&fit=crop"
                        alt="Animal"
                        class="rounded-t-lg w-full h-48 object-cover">
                    <div class="p-4">
                        <h5 class="text-lg font-bold text-gray-900 mb-2">Animal Ejemplo</h5>
                        <div class="space-y-1 text-sm text-gray-600 mb-3">
                            <p><span class="font-semibold">Sexo:</span> Macho</p>
                            <p><span class="font-semibold">Color:</span> Rojo</p>
                        </div>
                        <p class="text-xl font-bold text-green-600">$250,000</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección Derecha: Resumen de Venta -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Resumen de Venta</h2>

                <div class="space-y-3 mb-6 max-h-[400px] overflow-y-auto">
                    <template x-if="selectedAnimals.length === 0">
                        <div class="text-center py-8 text-gray-400">

                            <span class="material-symbols-outlined shrink-0 text-6xl mb-2">
                                shopping_cart
                            </span>
                            <p>No hay animales seleccionados</p>
                        </div>
                    </template>

                    <template x-for="(item, index) in selectedAnimals" :key="index">
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200 slide-in">
                            <img
                                :src="item.image"
                                :alt="item.name"
                                class="w-16 h-16 rounded object-cover">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800" x-text="item.name"></h3>
                                <p class="text-sm text-green-600 font-medium" x-text="'$' + item.price.toLocaleString()"></p>
                            </div>
                            <button
                                @click="selectedAnimals.splice(index, 1)"
                                class="text-red-500 hover:text-red-700 transition-colors">

                                <span class="material-symbols-outlined shrink-0 text-2xl">
                                   delete
                                </span>
                            </button>
                        </div>
                    </template>
                </div>

                <div class="border-t pt-4 mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600">Cantidad:</span>
                        <span class="font-semibold" x-text="selectedAnimals.length"></span>
                    </div>
                    <div class="flex justify-between items-center text-xl font-bold">
                        <span class="text-gray-800">Total:</span>
                        <span class="text-green-600" x-text="'$' + selectedAnimals.reduce((sum, a) => sum + a.price, 0).toLocaleString()"></span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <x-action-button icon="note_add" color="indigo" label="Observación" />

                    <x-action-button icon="check_circle" color="green" label="Registrar" />
                </div>
            </div>
        </div>
    </div>
</div>
