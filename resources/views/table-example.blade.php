<x-app-layout>
    <x-slot name="header">
        <x-header title="Dashboard" description="Administración del rancho"/>
    </x-slot>

    <h2 class="text-2xl font-bold text-gray-800 mb-4">Ejemplo de tabla</h2>

    @php
        $headers = ["Nombre", "Estado", "Categoria", "Precio", "Acciones"];
    @endphp

    <x-panel>
        <x-table :headings="$headers" class="sm:rounded-lg" name="myTable">
            {{-- El contenido del tbody ahora usa el componente <x-table-row> --}}
            <x-table-row>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    <x-status-label label="Activo" active />
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4 text-center">

                    <div class="flex items-center justify-center space-x-2">
                        <x-button variant="primary" icon="visibility">Ver</x-button>
                        <x-button variant="warning" icon="edit" data-modal-target="editUserModal" data-modal-show="editUserModal">Editar</x-button>
                        <x-button variant="danger" icon="delete">Eliminar</x-button>
                    </div>
                </td>
            </x-table-row>

            <x-table-row>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">
                    <x-status-label label="Activo" active />
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                    $1999
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center justify-center space-x-2">
                        <x-button variant="primary" icon="visibility">Ver</x-button>
                        <x-button variant="warning" icon="edit" data-modal-target="editUserModal" data-modal-show="editUserModal">Editar</x-button>
                        <x-button variant="danger" icon="delete">Eliminar</x-button>
                    </div>
                </td>
            </x-table-row>

            <x-table-row class="border-b-0"> {{-- Ejemplo: la última fila sin borde inferior --}}
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    <x-status-label label="Inactivo"/>
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">
                    $99
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center justify-center space-x-2">
                        <x-button variant="primary" icon="visibility">Ver</x-button>
                        <x-button variant="warning" icon="edit" data-modal-target="editUserModal" data-modal-show="editUserModal">Editar</x-button>
                        <x-button variant="danger" icon="delete">Eliminar</x-button>
                    </div>
                </td>
            </x-table-row>
        </x-table>

        <x-modal
            id="editUserModal"
            title="Editar usuario"
            action="#"
            method="PUT"
            maxWidth="2xl"
        >

            <div class="grid grid-cols-2 gap-6">

                <x-form.input name="first-name" label="First Name"  placeholder="Bonnie" required />

                <x-form.input name="last-name" label="Last Name"  placeholder="Green" required />

                <x-form.input type="email" name="email" label="Email"  placeholder="example@company.com" required />

                <x-form.input type="number" name="phone-number" label="Phone Number"  placeholder="e.g. +(12)3456 789" required />

                <x-form.input name="department" label="Department"  placeholder="Development" required />

                <x-form.input type="number" name="company" label="Company"  placeholder="123456" required />

                <x-form.input type="password" name="current-password" label="Current Password" placeholder="••••••••" required />

                <x-form.input type="password" name="new-password" label="New Password" placeholder="••••••••" required />

            </div>

            <x-slot:footer>

            </x-slot:footer>

        </x-modal>
        <!--Fin de la tabla-->
    </x-panel>
</x-app-layout>
