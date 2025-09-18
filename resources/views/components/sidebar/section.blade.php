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
            <x-sidebar.link icon="search" title="Buscar"/>
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
