
<aside
    id="sidebar"
    class="fixed z-30 h-full overflow-y-auto bg-white shadow-lg transition-all duration-300 ease-in-out"
    :class="{ 'w-64 sidebar-expanded': sidebarOpen, 'w-20': !sidebarOpen }"
    @mouseenter="if (window.innerWidth >= 1024) sidebarOpen = true"
    @mouseleave="if (window.innerWidth >= 1024) sidebarOpen = false"
    @click.outside="if (window.innerWidth < 1024 && !$event.target.closest('#mobile-menu-button')) sidebarOpen = false"
>
    <div class="flex h-full flex-col justify-between p-4">
        <div class="flex flex-col gap-4">
            <div class="flex items-center gap-3">
                <img
                    alt="Rancho Feliz Logo"
                    class="h-10 w-10 shrink-0 rounded-full"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuByFeCZLrPOQiHs7L9GffYQIAY0Jn81Kk_Ceo4q4Qj9s9PaQg1H2I5GPyXT2huv_f3cbJeRLnje13bt-Xr_rPtB1gYRf1i2JbpR27RHTWH-xsM-SsNgK3uQeGxL9TCuabcqNXJqw-fQkMhjVMXaX1BVISd17WcuxLIGz57gwtfgngjG-595iVkUEhoV1WdiL5Rum9V59xR3UzK3jRjRUivpWz7-kqDXFfk_ZSVwqews7BoPfgGvxAqVPGwf1AhXb5JulBrnItnx36M"
                />
                <div class="sidebar-text truncate">
                    <h1 class="text-base font-bold text-gray-800">
                        Rancho Feliz
                    </h1>
                    <p class="text-sm text-gray-500">
                        Administrador
                    </p>
                </div>
            </div>
            <nav class="mt-8 flex flex-col gap-2">
                <a
                    class="flex items-center gap-3 rounded-lg bg-primary-100 px-3 py-2 text-primary-700"
                    href="#"
                >
                    <span class="material-symbols-outlined shrink-0"
                        >dashboard</span
                    >
                    <span class="sidebar-text text-sm font-medium"
                        >Dashboard</span
                    >
                </a>

                <div x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        class="flex w-full items-center justify-between gap-3 rounded-lg px-3 py-2 text-gray-600 hover:bg-gray-100"
                    >
                        <div class="flex items-center gap-3">
                            <span
                                class="material-symbols-outlined shrink-0"
                                >inventory_2</span
                            >
                            <span
                                class="sidebar-text text-sm font-medium"
                                >Inventario</span
                            >
                        </div>
                        <span
                            class="material-symbols-outlined shrink-0 sidebar-text transition-transform duration-200"
                            :class="{'rotate-180': open}"
                            >expand_more</span
                        >
                    </button>
                    <div
                        x-show="open"
                        x-transition
                        class="overflow-hidden"
                    >
                        <div class="mt-2 flex flex-col gap-1 pl-2">
                            <a
                                href="#"
                                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-500 hover:bg-gray-100"
                            >
                                <span
                                    class="material-symbols-outlined shrink-0 text-lg"
                                    >search</span
                                >
                                <span class="sidebar-text"
                                    >Consultar</span
                                >
                            </a>
                            <a
                                href="#"
                                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-500 hover:bg-gray-100"
                            >
                                <span
                                    class="material-symbols-outlined shrink-0 text-lg"
                                    >bar_chart</span
                                >
                                <span class="sidebar-text"
                                    >Estadísticas</span
                                >
                            </a>
                            <a
                                href="#"
                                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-500 hover:bg-gray-100"
                            >
                                <span
                                    class="material-symbols-outlined shrink-0 text-lg"
                                    >add_box</span
                                >
                                <span class="sidebar-text"
                                    >Añadir producto</span
                                >
                            </a>
                        </div>
                    </div>
                </div>

                <a
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-600 hover:bg-gray-100"
                    href="#"
                >
                    <span class="material-symbols-outlined shrink-0"
                        >factory</span
                    >
                    <span class="sidebar-text text-sm font-medium"
                        >Producción</span
                    >
                </a>
                <a
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-600 hover:bg-gray-100"
                    href="#"
                >
                    <span class="material-symbols-outlined shrink-0"
                        >payments</span
                    >
                    <span class="sidebar-text text-sm font-medium"
                        >Finanzas</span
                    >
                </a>
                <a
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-600 hover:bg-gray-100"
                    href="#"
                >
                    <span class="material-symbols-outlined shrink-0"
                        >monitoring</span
                    >
                    <span class="sidebar-text text-sm font-medium"
                        >Reportes</span
                    >
                </a>
            </nav>
        </div>
        <div class="flex flex-col gap-2">
            <a
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-600 hover:bg-gray-100"
                href="#"
            >
                <span class="material-symbols-outlined shrink-0"
                    >settings</span
                >
                <span class="sidebar-text text-sm font-medium"
                    >Configuración</span
                >
            </a>
            <a
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-600 hover:bg-gray-100"
                href="#"
            >
                <span class="material-symbols-outlined shrink-0"
                    >logout</span
                >
                <span class="sidebar-text text-sm font-medium"
                    >Cerrar Sesión</span
                >
            </a>
        </div>
    </div>
</aside>
