<div
    x-data="{ open: false }"
    class="relative w-full max-w-md mx-auto"
>
    <form @submit.prevent class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>

        <input
            type="search"
            wire:model.live="query"
            @focus="open = true"
            @click.away="open = false"
            placeholder="Buscar cliente..."
            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg
                   bg-gray-50 focus:ring-primary-500 focus:border-primary-500
                   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                   dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        />


        <button
            type="submit"
            class="text-white absolute end-2.5 bottom-2.5 bg-primary-700 hover:bg-primary-800
                   focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium
                   rounded-lg text-sm px-4 py-2
                   dark:focus:ring-blue-800">
            Buscar
        </button>
    </form>

    <div
        x-show="open && $wire.results.length > 0"
        x-transition
        class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700"
    >
        <ul>
            @foreach ($results as $result)
                <li
                    wire:click="selectResult('{{ $result }}')"
                    class="px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                >
                    {{ $result }}
                </li>
            @endforeach
        </ul>
    </div>

    <div
        x-show="open && $wire.results.length === 0 && $wire.query.length > 1"
        class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">
            No hay resultados
        </div>
    </div>
</div>
