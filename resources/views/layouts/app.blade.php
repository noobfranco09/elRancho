<!doctype html>
<html lang="es" data-theme="light">

<head>
    <meta charset="utf-8" />
    <link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect" />
    <link as="style"
        href="https://fonts.googleapis.com/css2?display=swap&family=Inter%3Awght%40400%3B500%3B700%3B900&family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.3.4/datatables.min.js"
        integrity="sha384-mtJ3+H/dkUyvhmcXYSyIZyaeG0TnEkh91c1JwFkrkBLHBv8oQ3lFjUp8xfDan41b"
        crossorigin="anonymous"></script>

    <title>Rancho Admin</title>
    <link href="data:image/x-icon;base64," rel="icon" type="image/x-icon" />



    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-50 text-gray-900" x-data="{ sidebarOpen: false, loaded: true }"
    x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })">
    <x-preloader />

    <div class="flex min-h-screen" style="font-family: Inter, &quot;Noto Sans&quot;, sans-serif">


        <x-sidebar>

            <x-sidebar.section icon="dashboard" :href="route('dashboard')" title="Dashboard" />

            <x-sidebar.section icon="people_alt" title="Usuarios">
                <x-sidebar.section icon="people_alt" title="Empleados" :href="route('empleados')"
                    :selected="request()->routeIs('empleados')" />
                <x-sidebar.section icon="security" title="Roles" :href="route('roles')"
                    :selected="request()->routeIs('roles')" />
                <x-sidebar.section icon="person" title="Clientes" :href="route('clientes')"
                    :selected="request()->routeIs('clientes')" />
            </x-sidebar.section>


            <x-sidebar.section icon="pets" title="Animales">
                <x-sidebar.link icon="pets" title="Gestionar animales" :href="route('animales')" />
                <x-sidebar.link icon="account_tree" title="Consultar ancentros" selected />
                <x-sidebar.link icon="description" title="Registrar documentos" href="noce.html" />
            </x-sidebar.section>


            <x-sidebar.section icon="vaccines" title="Vacunas">
                <x-sidebar.link icon="vaccines" title="Gestionar vacunas" :href="route('vacunas')"
                    :selected="request()->routeIs('vacunas')" />
            </x-sidebar.section>


            <x-sidebar.section icon="warehouse" title="Establos" :selected="request()->routeIs('establos')">

                <x-sidebar.link icon="warehouse" title="Gestionar establos" :href="route('establos')"
                    :selected="request()->routeIs('establos')" />
                <x-sidebar.link icon="house" title="Gestionar cajones" :href="route('cajones')"
                    :selected="request()->routeIs('cajones')" />

            </x-sidebar.section>


            <x-sidebar.section icon="stethoscope" title="Veterinarios">

                <x-sidebar.link icon="warehouse" title="Veterinarios" :href="route('veterinarios')"
                    :selected="request()->routeIs('veterinarios')" />
                <x-sidebar.link icon="warehouse" title="Gestionar veterinarios" />
                <x-sidebar.link icon="warehouse" title="Consultar veterinarios" />

            </x-sidebar.section>

            <x-sidebar.section icon="inventory_2" title="Inventario">

                <x-sidebar.link icon="inventory" title="Gestión de inventario" :href="route('inventario')"
                    :selected="request()->routeIs('inventario')" />
            </x-sidebar.section>

            <x-sidebar.section icon="eco" title="Alimentos" :href="route('alimentos')"
                    :selected="request()->routeIs('alimentos')"/>


            <x-sidebar.section icon="factory" title="Produccion" :href="route('table-example')"
                :selected="request()->routeIs('table-example')" />
        </x-sidebar>

        <main class="ml-20 w-full flex-1 p-6 transition-all duration-300 ease-in-out lg:p-8"
            :class="{ 'lg:ml-64': sidebarOpen, 'lg:ml-20': !sidebarOpen }">
            @isset($header)
                {{ $header }}
            @endisset

            <section class="mt-8">
                {{ $slot }}
            </section>
        </main>
    </div>
    @livewire('wire-elements-modal')
    @livewireScripts
</body>

</html>