
@props([
    'id',
    'default' => null, // ID del tab que estará activo por defecto
])

<div
    x-data="{ activeTab: '{{ $default }}' }"
    class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700"
>
    <!-- Encabezado -->
    <ul
        class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50
               dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
        role="tablist"
    >
        {{ $tabs ?? '' }}
    </ul>

    <!-- Contenido -->
    <div>
        {{ $slot }}
    </div>
</div>
