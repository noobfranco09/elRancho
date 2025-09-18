<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <link
            crossorigin=""
            href="https://fonts.gstatic.com/"
            rel="preconnect"
        />
        <link
            as="style"
            href="https://fonts.googleapis.com/css2?display=swap&family=Inter%3Awght%40400%3B500%3B700%3B900&family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
            rel="stylesheet"
        />
        <title>Rancho Admin</title>
        <link href="data:image/x-icon;base64," rel="icon" type="image/x-icon" />


        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

        <script
            defer
            src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
        ></script>

        <style type="text/tailwindcss">
            :root {
                --primary-50: #f0fdf4;
                --primary-100: #dcfce7;
                --primary-200: #bbf7d0;
                --primary-300: #86efac;
                --primary-400: #4ade80;
                --primary-500: #22c55e;
                --primary-600: #16a34a;
                --primary-700: #15803d;
                --primary-800: #166534;
                --primary-900: #14532d;
                --primary-950: #052e16;
            }

            .sidebar-text {
                opacity: 0;
                transition: opacity 0.2s ease-in-out;
                white-space: nowrap;
            }

            .sidebar-expanded .sidebar-text {
                opacity: 1;
                transition-delay: 0.15s;
            }
        </style>

        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                50: "var(--primary-50)",
                                100: "var(--primary-100)",
                                200: "var(--primary-200)",
                                300: "var(--primary-300)",
                                400: "var(--primary-400)",
                                500: "var(--primary-500)",
                                600: "var(--primary-600)",
                                700: "var(--primary-700)",
                                800: "var(--primary-800)",
                                900: "var(--primary-900)",
                                950: "var(--primary-950)",
                            },
                        },
                    },
                },
            };
        </script>
    </head>
    <body class="bg-gray-50 text-gray-900" x-data="{ sidebarOpen: false }">
        <div
            class="flex min-h-screen"
            style="font-family: Inter, &quot;Noto Sans&quot;, sans-serif"
        >

            <x-sidebar />

            <main
                class="ml-20 w-full flex-1 p-6 transition-all duration-300 ease-in-out lg:p-8"
                :class="{ 'lg:ml-64': sidebarOpen, 'lg:ml-20': !sidebarOpen }"
            >
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
                                Dashboard
                            </h1>
                            <p class="text-gray-500">
                                Resumen general de las operaciones del rancho.
                            </p>
                        </div>

                        <!-- Derecha -->
                        <div class="flex items-center gap-2 sm:gap-3">
                            <!-- Notificaciones -->
                            <div class="relative">
                                <button
                                    type="button"
                                    class="relative rounded-full bg-white p-2 shadow hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                    aria-label="Notificaciones"
                                    @click="notifOpen = !notifOpen; userOpen=false"
                                >
                                    <span class="material-symbols-outlined"
                                        >notifications</span
                                    >
                                    <span
                                        class="absolute -right-0.5 -top-0.5 inline-flex h-2.5 w-2.5 rounded-full bg-red-500"
                                    ></span>
                                </button>

                                <!-- Panel de notificaciones -->
                                <div
                                    x-show="notifOpen"
                                    x-transition
                                    @click.outside="notifOpen=false"
                                    class="absolute right-0 z-50 mt-2 w-[22rem] max-w-[90vw] rounded-2xl border border-gray-200 bg-white shadow-xl"
                                >
                                    <div
                                        class="flex items-center justify-between px-4 py-3"
                                    >
                                        <h3
                                            class="text-base font-semibold text-gray-800"
                                        >
                                            Notification
                                        </h3>
                                        <button
                                            class="rounded-full p-1 hover:bg-gray-50"
                                            @click="notifOpen=false"
                                            aria-label="Cerrar notificaciones"
                                        >
                                            <span
                                                class="material-symbols-outlined text-gray-500"
                                                >close</span
                                            >
                                        </button>
                                    </div>
                                    <div class="h-px bg-gray-100"></div>

                                    <!-- Lista -->
                                    <div class="max-h-80 overflow-y-auto p-2">
                                        <!-- Item 1 -->
                                        <a
                                            href="#"
                                            class="group flex gap-3 rounded-xl px-3 py-3 hover:bg-gray-50"
                                        >
                                            <div class="relative shrink-0">
                                                <img
                                                    class="h-10 w-10 rounded-full object-cover"
                                                    src="https://i.pravatar.cc/64?img=5"
                                                    alt="Terry Franci"
                                                />
                                                <span
                                                    class="absolute -right-0 -bottom-0 h-3 w-3 rounded-full border-2 border-white bg-emerald-500"
                                                ></span>
                                            </div>
                                            <div class="min-w-0">
                                                <p
                                                    class="text-sm text-gray-700"
                                                >
                                                    <span class="font-semibold"
                                                        >Terry Franci</span
                                                    >
                                                    requests permission to
                                                    change
                                                    <span
                                                        class="font-semibold text-gray-900"
                                                        >Project - Nganter
                                                        App</span
                                                    >
                                                </p>
                                                <div
                                                    class="mt-1 flex items-center gap-2 text-xs text-gray-500"
                                                >
                                                    <span>Project</span>
                                                    <span>•</span>
                                                    <span>5 min ago</span>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- Item 2 (seleccionado estilo tarjeta) -->
                                        <a
                                            href="#"
                                            class="group flex gap-3 rounded-xl bg-gray-100 px-3 py-3 hover:bg-gray-100"
                                        >
                                            <div class="relative shrink-0">
                                                <img
                                                    class="h-10 w-10 rounded-full object-cover"
                                                    src="https://i.pravatar.cc/64?img=32"
                                                    alt="Alena Franci"
                                                />
                                                <span
                                                    class="absolute -right-0 -bottom-0 h-3 w-3 rounded-full border-2 border-white bg-emerald-500"
                                                ></span>
                                            </div>
                                            <div class="min-w-0">
                                                <p
                                                    class="text-sm text-gray-700"
                                                >
                                                    <span class="font-semibold"
                                                        >Alena Franci</span
                                                    >
                                                    requests permission to
                                                    change
                                                    <span
                                                        class="font-semibold text-gray-900"
                                                        >Project - Nganter
                                                        App</span
                                                    >
                                                </p>
                                                <div
                                                    class="mt-1 flex items-center gap-2 text-xs text-gray-500"
                                                >
                                                    <span>Project</span>
                                                    <span>•</span>
                                                    <span>8 min ago</span>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- Item 3 -->
                                        <a
                                            href="#"
                                            class="group flex gap-3 rounded-xl px-3 py-3 hover:bg-gray-50"
                                        >
                                            <div class="relative shrink-0">
                                                <img
                                                    class="h-10 w-10 rounded-full object-cover"
                                                    src="https://i.pravatar.cc/64?img=15"
                                                    alt="Jocelyn Kenter"
                                                />
                                                <span
                                                    class="absolute -right-0 -bottom-0 h-3 w-3 rounded-full border-2 border-white bg-emerald-500"
                                                ></span>
                                            </div>
                                            <div class="min-w-0">
                                                <p
                                                    class="text-sm text-gray-700"
                                                >
                                                    <span class="font-semibold"
                                                        >Jocelyn Kenter</span
                                                    >
                                                    requests permission to
                                                    change
                                                    <span
                                                        class="font-semibold text-gray-900"
                                                        >Project - Nganter
                                                        App</span
                                                    >
                                                </p>
                                                <div
                                                    class="mt-1 flex items-center gap-2 text-xs text-gray-500"
                                                >
                                                    <span>Project</span>
                                                    <span>•</span>
                                                    <span>15 min ago</span>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- Item 4 (estado rojo) -->
                                        <a
                                            href="#"
                                            class="group flex gap-3 rounded-xl px-3 py-3 hover:bg-gray-50"
                                        >
                                            <div class="relative shrink-0">
                                                <img
                                                    class="h-10 w-10 rounded-full object-cover"
                                                    src="https://i.pravatar.cc/64?img=7"
                                                    alt="Brandon Philips"
                                                />
                                                <span
                                                    class="absolute -right-0 -bottom-0 h-3 w-3 rounded-full border-2 border-white bg-red-500"
                                                ></span>
                                            </div>
                                            <div class="min-w-0">
                                                <p
                                                    class="text-sm text-gray-700"
                                                >
                                                    <span class="font-semibold"
                                                        >Brandon Philips</span
                                                    >
                                                    requests permission to
                                                    change
                                                    <span
                                                        class="font-semibold text-gray-900"
                                                        >Project - Nganter
                                                        App</span
                                                    >
                                                </p>
                                                <div
                                                    class="mt-1 flex items-center gap-2 text-xs text-gray-500"
                                                >
                                                    <span>Project</span>
                                                    <span>•</span>
                                                    <span>1 hr ago</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="h-px bg-gray-100"></div>
                                    <button
                                        class="w-full rounded-b-2xl px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50"
                                        @click="/* ir a la página de notificaciones */"
                                    >
                                        View All Notification
                                    </button>
                                </div>
                            </div>

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
                                            src="https://i.pravatar.cc/64?img=12"
                                            alt="Avatar"
                                            class="w-full h-full rounded-full object-cover block"
                                            style="aspect-ratio: 1/1"
                                        />
                                    </div>

                                    <div class="hidden text-left sm:block">
                                        <p
                                            class="text-sm font-semibold text-gray-800"
                                        >
                                            Musharof
                                        </p>
                                        <p
                                            class="hidden max-w-[160px] truncate text-xs text-gray-500 lg:block"
                                        >
                                            randomuser@pinjo.com
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
                                    class="absolute right-0 z-50 mt-2 w-64 sm:w-80 overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xl"
                                >
                                    <div
                                        class="flex items-center gap-3 px-4 py-4"
                                    >
                                        <img
                                            src="https://i.pravatar.cc/64?img=12"
                                            alt="Avatar"
                                            class="h-10 w-10 aspect-square rounded-full object-cover shrink-0"
                                        />
                                        <div class="min-w-0">
                                            <p
                                                class="truncate text-sm font-semibold text-gray-800"
                                            >
                                                Musharof Chowdhury
                                            </p>
                                            <p
                                                class="truncate text-xs text-gray-500"
                                            >
                                                randomuser@pinjo.com
                                            </p>
                                        </div>
                                    </div>
                                    <div class="h-px bg-gray-100"></div>
                                    <nav class="p-2">
                                        <a
                                            href="#"
                                            class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-50"
                                        >
                                            <span
                                                class="material-symbols-outlined"
                                                >account_circle</span
                                            >
                                            <span>Edit profile</span>
                                        </a>
                                        <a
                                            href="#"
                                            class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-50"
                                        >
                                            <span
                                                class="material-symbols-outlined"
                                                >admin_panel_settings</span
                                            >
                                            <span>Account settings</span>
                                        </a>
                                        <a
                                            href="#"
                                            class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-50"
                                        >
                                            <span
                                                class="material-symbols-outlined"
                                                >help</span
                                            >
                                            <span>Support</span>
                                        </a>
                                    </nav>
                                    <div class="h-px bg-gray-100"></div>
                                    <button
                                        class="flex w-full items-center gap-3 px-3 py-3 text-left text-sm text-gray-700 hover:bg-gray-50"
                                        type="button"
                                        @click="/* logout */"
                                    >
                                        <span class="material-symbols-outlined"
                                            >logout</span
                                        >
                                        <span>Sign out</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="mt-8">
                    <h2 class="text-2xl font-bold text-gray-800">Tendencias</h2>
                    <div class="mt-4 grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <div
                            class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm"
                        >
                            <div class="flex items-start justify-between">
                                <div>
                                    <h4
                                        class="text-lg font-semibold text-gray-700"
                                    >
                                        Producción de leche
                                    </h4>
                                    <p class="text-sm text-gray-500">
                                        Este mes
                                    </p>
                                </div>
                                <div
                                    class="flex items-center gap-1 text-green-600"
                                >
                                    <span
                                        class="material-symbols-outlined text-base"
                                        >arrow_upward</span
                                    >
                                    <span class="text-lg font-bold">+15%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
