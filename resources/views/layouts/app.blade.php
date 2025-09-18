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

            <x-sidebar>
                <x-sidebar.section icon="dashboard" title="Dashboard" selected/>

                <x-sidebar.section icon="inventory_2" title="Inventario">
                    <x-sidebar.link icon="search" title="Buscar"/>
                    <x-sidebar.link icon="bar_chart" title="Estadisticas" selected/>
                    <x-sidebar.link icon="add_box" title="Añadir producto" src="noce.html"/>
                </x-sidebar.section>

                <x-sidebar.section icon="factory" title="Produccion"/>
            </x-sidebar>

            <main
                class="ml-20 w-full flex-1 p-6 transition-all duration-300 ease-in-out lg:p-8"
                :class="{ 'lg:ml-64': sidebarOpen, 'lg:ml-20': !sidebarOpen }"
            >

                <x-header />

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
