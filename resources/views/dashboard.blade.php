<x-app-layout>
    <x-slot name="header">
        <x-header title="Dashboard" description="Administración del rancho"/>
    </x-slot>

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
</x-app-layout>
