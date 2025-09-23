<x-app-layout>
    <x-slot name="header">
        <x-header title="Gestión de animales" description="Sección para la gestión de animales"/>
    </x-slot>

    @php
        $headers = ["Nombre", "Precio", "Sexo", "Acción"];
    @endphp

    <x-panel>
        <x-table :headings="$headers" class="sm:rounded-lg" name="myTable">
            {{-- El contenido del tbody ahora usa el componente <x-table-row> --}}
            @foreach ($animales as $animal)
                <x-table-row>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $animal->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $animal->precio }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $animal->sexo }}
                    </td>
                    <td class="px-6 py-4 text-center">

                        <div class="flex items-center justify-center space-x-2">
                            <x-button variant="primary" icon="visibility">Ver</x-button>
                            <x-button variant="warning" icon="edit" data-modal-target="editUserModal" data-modal-show="editUserModal">Editar</x-button>
                            <x-button variant="danger" icon="delete">Eliminar</x-button>
                        </div>
                    </td>
                </x-table-row>

            @endforeach



        </x-table>
        <!--Fin de la tabla-->
    </x-panel>
</x-app-layout>
