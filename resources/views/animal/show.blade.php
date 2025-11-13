
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
                            src="{{ $animal->imagen ? asset('storage/'.$animal->imagen) : 'https://placehold.net/400x400.png'}}"
                            alt="{{ $animal->nombre }}"
                        >

                        <!-- Overlay cambiar foto
                        <div class="absolute inset-0 bg-black/40 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <button class="text-white bg-white/20 backdrop-blur-sm hover:bg-white/30 font-medium rounded-full text-sm px-4 py-2 flex items-center gap-2 transition-colors duration-300">
                                <i class="fas fa-camera"></i>
                                Cambiar foto
                            </button>
                        </div>
                        -->

                        <!-- Estado -->
                        <div class="absolute bottom-2 right-2">
                            <span class="{{ ($animal->estado === 1) ? 'bg-green-500' : 'bg-red-500'}} text-white text-xs font-bold px-2.5 py-1 rounded-full shadow">
                                {{ ($animal->estado === 1) ? "Activo" : "Inactivo" }}
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
                                    {{ $animal->especie->nombre ?? "Sin especie" }}
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

                        <x-info-card icon="cake" iconClass="text-pink-500" label="Nacimiento">
                            {{ $animal->fecha_nacimiento }}
                        </x-info-card>

                        <x-info-card icon="badge" iconClass="text-blue-500" label="Código">
                            {{ $animal->codigo }}
                        </x-info-card>

                        <x-info-card icon="attach_money" iconClass="text-emerald-500" label="Precio">
                            ${{ $animal->precio }}
                        </x-info-card>

                        <x-info-card icon="transgender" iconClass="{{ $animal->sexo === 'M' ? 'text-blue-500' : 'text-pink-500' }}" label="Sexo">
                            {{ $animal->sexo === 'M' ? 'Macho' : 'Hembra' }}
                        </x-info-card>

                        <x-info-card icon="palette" iconClass="text-amber-500" label="Color">
                            {{ $animal->color }}
                        </x-info-card>

                        <x-info-card icon="pets" iconClass="text-purple-500" label="Marcas">
                            {{ $animal->marcas }}
                        </x-info-card>
                    </div>
                </div>
            </div>

            <x-tab.container id="animalTab">
                <x-slot name="navigation">
                    <x-tab.nav-item target="vacunas" :active="true">
                        Vacunas
                    </x-tab.nav-item>

                    <x-tab.nav-item target="enfermedades">
                        Enfermedades
                    </x-tab.nav-item>

                    <x-tab.nav-item target="alimentaciones">
                        Alimentaciones
                    </x-tab.nav-item>

                    <x-tab.nav-item target="ancestros">
                        Ancestros
                    </x-tab.nav-item>
                </x-slot>

                <x-tab.panel id="vacunas" :active="true">
                    <x-tab.panel-header title="Registro de vacunas">
                        <x-button @click="$dispatch('openModal', {component: 'vacunacion.modal', arguments: { animalId:{{ $animal->id }} }})">
                            Asignar vacunacion
                        </x-button>
                    </x-tab.panel-header>

                    <livewire:vacunacion.table :animalId="$animal->id"/>

                </x-tab.panel>

                <x-tab.panel id="enfermedades">
                    <x-tab.panel-header title="Enfermedades">

                        <x-button icon="add" @click="$dispatch('openModal', { component: 'enfermedad.modal', arguments: { animal_id: {{ $animal->id }} }  })">
                            Registrar enfermedad
                        </x-button>

                    </x-tab.panel-header>

                    <livewire:enfermedad.table :animalId="$animal->id"/>
                </x-tab.panel>

                <x-tab.panel id="alimentaciones">
                    <x-tab.panel-header title="Alimentaciónes">

                        <x-button icon="add" @click="$dispatch('openModal', { component: 'alimentacion.modal', arguments: { animal_id: {{ $animal->id }} }  })">
                            Registrar alimentación
                        </x-button>

                    </x-tab.panel-header>

                    <livewire:alimentacion.table />

                </x-tab.panel>

                <x-tab.panel id="ancestros">
                    <x-tab.panel-header title="Ancestros">

                        <x-button icon="add" @click="$dispatch('openModal', { component: 'animal.ancestro-modal', arguments: { animal_id: {{ $animal->id }} }  })">
                            Registrar padres
                        </x-button>

                    </x-tab.panel-header>

                    <livewire:animal.ancestro-table :animalId="$animal->id" />

                </x-tab.panel>



            </x-tab.container>



            <!-- Acciones -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Acciones Rápidas</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">Gestiona el perfil del animal</p>
                    </div>
                </div>

                <!-- Acciones principales -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
                    <x-action-button icon="edit" label="Editar perfil" color="blue" />
                    <x-action-button icon="history" label="Ver historial" color="purple" />
                    <x-action-button icon="event" label="Nueva cita" color="green" badge="3" />
                    <x-action-button icon="vaccines" label="Vacunas" color="amber" />

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("enfermedadCreada", () => {
            Toast.fire({
                icon: "success",
                title: "Enfermedad creada"
            })
        })

        document.addEventListener("enfermedadEditada", () => {
            Toast.fire({
                icon: "success",
                title: "Enfermedad editada"
            })
        })

        document.addEventListener("enfermedadEliminada", () => {
            Toast.fire({
                icon: "success",
                title: "Enfermedad eliminada"
            })
        })

        document.addEventListener("vacunacionCreada", () => {
            Toast.fire({
                icon: "success",
                title: "Vacunación creada"
            })
        })

        document.addEventListener("vacunacionEliminada", () => {
            Toast.fire({
                icon: "success",
                title: "Vacunación eliminada"
            })
        })

        document.addEventListener("alimentacionCreada", () => {
            Toast.fire({
                icon: "success",
                title: "Alimentación registrada"
            })
        })

        document.addEventListener("alimentacionEditada", () => {
            Toast.fire({
                icon: "success",
                title: "Alimentación editada"
            })
        })

        document.addEventListener("alimentacionEliminada", () => {
            Toast.fire({
                icon: "success",
                title: "Alimentación eliminada"
            })
        })

    </script>
</x-app-layout>
