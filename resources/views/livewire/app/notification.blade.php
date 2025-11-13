
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
        class="absolute right-0 z-40 mt-2 w-[22rem] max-w-[90vw] rounded-2xl border border-gray-200 bg-white shadow-xl"
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
            <x-notification.item
                text="El producto <span class='font-semibold text-gray-900'>Xiaomi Pad 6</span> tiene solo <span class='font-bold text-red-600'>5 unidades</span> restantes."
                label="Nose"
                time="15 min ago"
                link="/inventario/xiaomi-pad-6"
            />

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
