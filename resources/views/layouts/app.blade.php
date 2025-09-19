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

        <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.3.4/datatables.min.js" integrity="sha384-mtJ3+H/dkUyvhmcXYSyIZyaeG0TnEkh91c1JwFkrkBLHBv8oQ3lFjUp8xfDan41b" crossorigin="anonymous"></script>

        <title>Rancho Admin</title>
        <link href="data:image/x-icon;base64," rel="icon" type="image/x-icon" />



        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 text-gray-900" x-data="{ sidebarOpen: false, loaded: true }" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })">
        <x-preloader />

        <div
            class="flex min-h-screen"
            style="font-family: Inter, &quot;Noto Sans&quot;, sans-serif"
        >

            <x-sidebar>
                <x-sidebar.section icon="dashboard" title="Dashboard" :src="route('dashboard')" :selected="request()->routeIs('dashboard')"/>

                <x-sidebar.section icon="inventory_2" title="Inventario">
                    <x-sidebar.link icon="search" title="Buscar"/>
                    <x-sidebar.link icon="bar_chart" title="Estadisticas" selected/>
                    <x-sidebar.link icon="add_box" title="Añadir producto" src="noce.html"/>
                </x-sidebar.section>

                <x-sidebar.section icon="factory" title="Produccion" :src="route('table-example')" :selected="request()->routeIs('table-example')"/>
            </x-sidebar>

            <main
                class="ml-20 w-full flex-1 p-6 transition-all duration-300 ease-in-out lg:p-8"
                :class="{ 'lg:ml-64': sidebarOpen, 'lg:ml-20': !sidebarOpen }"
            >
                @isset($header)
                    {{ $header }}
                @endisset

                <section class="mt-8">
                    {{ $slot }}
                </section>
            </main>
        </div>
    </body>
</html>
