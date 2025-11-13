@props([
    'title',
    'description',
    'user' => null,
])
<header class="mb-8">
    <div
        class="flex items-center justify-between rounded-xl border border-gray-200 bg-white px-4 py-3 shadow-sm lg:px-6 lg:py-4"
        x-data="{ userOpen:false, notifOpen:false }"
        @keydown.escape.window="userOpen=false; notifOpen=false"
    >
        <!-- Botón menú móvil (EN FLUJO, SIN fixed) -->
        <button
            id="mobile-menu-button"
            class="inline-flex lg:hidden rounded-full bg-white p-2 shadow-md focus:outline-none focus:ring-2 focus:ring-primary-500"
            @click="sidebarOpen = !sidebarOpen"
            aria-controls="sidebar"
            :aria-expanded="sidebarOpen.toString()"
        >
            <span class="material-symbols-outlined">menu</span>
        </button>

        <!-- Izquierda: título -->
        <div class="min-w-0">
            <h1
                class="text-2xl font-bold text-gray-800 lg:text-3xl"
            >
               {{ $title }}
            </h1>
            <p class="text-gray-500">
                {{ $description }}
            </p>
        </div>

        <!-- Derecha -->
        <div class="flex items-center gap-2 sm:gap-3">
            <!-- Notificaciones -->
            <livewire:app.notification />

            <!-- Usuario / Dropdown -->
            <div class="relative">
                <button
                    type="button"
                    class="flex items-center gap-2 sm:gap-3 rounded-full bg-white px-2 py-2 sm:px-3 shadow hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500"
                    @click="userOpen = !userOpen; notifOpen=false"
                    :aria-expanded="userOpen.toString()"
                    aria-haspopup="true"
                >
                    <!-- Avatar fijo dentro del botón -->
                    <div
                        class="relative shrink-0 w-8 h-8 sm:w-9 sm:h-9 min-w-[2rem] min-h-[2rem] sm:min-w-[2.25rem] sm:min-h-[2.25rem]"
                    >
                        <img
                            src="{{ file_exists(public_path('storage/profile.jpg'))
                                ? asset('storage/profile.jpg')
                                : 'https://i.pravatar.cc/64?img=12' }}"
                            alt="Avatar"
                            class="w-full h-full rounded-full object-cover block"
                            style="aspect-ratio: 1/1"
                        />
                    </div>

                    <div class="hidden text-left sm:block">
                        <p class="text-sm font-semibold text-gray-800">
                            {{ Auth::user()?->name ?? 'Invitado' }}
                        </p>
                        <p class="hidden max-w-[160px] truncate text-xs text-gray-500 lg:block">
                            {{ Auth::user()?->email ?? '' }}
                        </p>
                    </div>
                    <span
                        class="hidden text-gray-500 sm:inline material-symbols-outlined"
                        >expand_more</span
                    >
                </button>

                <!-- Menú usuario -->
                <div
                    x-show="userOpen"
                    x-transition
                    @click.outside="userOpen=false"
                    class="absolute right-0 z-40 mt-2 w-64 sm:w-80 overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xl"
                >
                    <div
                        class="flex items-center gap-3 px-4 py-4"
                    >
                        <img

                            src="{{ file_exists(public_path('storage/profile.jpg'))
                                ? asset('storage/profile.jpg')
                                : 'https://i.pravatar.cc/64?img=12' }}"
                            alt="Avatar"
                            class="h-10 w-10 aspect-square rounded-full object-cover shrink-0"
                        />
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-gray-800">
                                {{ Auth::user()?->name ?? 'Invitado' }}
                            </p>
                            <p class="hidden max-w-[160px] truncate text-xs text-gray-500 lg:block">
                                {{ Auth::user()?->email ?? '' }}
                            </p>
                        </div>
                    </div>
                    <div class="h-px bg-gray-100"></div>
                    <nav class="p-2">
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            <span
                                class="material-symbols-outlined"
                                >account_circle</span
                            >
                            <span>Editar perfil</span>
                        </a>
                    </nav>
                    <div class="h-px bg-gray-100"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="flex w-full items-center gap-3 px-3 py-3 text-left text-sm text-gray-700 hover:bg-gray-50"
                            type="submit"
                        >
                            <span class="material-symbols-outlined">logout</span>
                            <span>Cerrar sesión</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
