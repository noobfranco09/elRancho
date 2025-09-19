<x-app-layout>
    <x-slot name="header">
        <x-header title="Dashboard" description="Administración del rancho"/>
    </x-slot>

    <h2 class="text-2xl font-bold text-gray-800 mb-4">Ejemplo de tabla</h2>

    <x-panel>

        <div class="relative overflow-x-auto sm:rounded-lg">

            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500"
                id="myTable"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b border-gray-200 hover:bg-gray-50"
                    >
                        <th
                            scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap"
                        >
                            <img
                                class="w-10 h-10 rounded-full"
                                src="/docs/images/people/profile-picture-1.jpg"
                                alt="Jese image"
                            />
                            <div class="ps-3">
                                <div
                                    class="text-base font-semibold"
                                >
                                    Neil Sims
                                </div>
                                <div
                                    class="font-normal text-gray-500"
                                >
                                    neil.sims@flowbite.com
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            React Developer
                        </td>
                        <td class="px-6 py-4">
                            <x-status-label active label="Online"/>
                        </td>
                        <td class="px-6 py-4">
                            <a
                                href="#"
                                type="button"
                                data-modal-target="editUserModal"
                                data-modal-show="editUserModal"
                                class="font-medium text-blue-600 hover:underline"
                                >Edit user</a
                            >
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b border-gray-200 hover:bg-gray-50"
                    >
                        <th
                            scope="row"
                            class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            <img
                                class="w-10 h-10 rounded-full"
                                src="/docs/images/people/profile-picture-3.jpg"
                                alt="Jese image"
                            />
                            <div class="ps-3">
                                <div
                                    class="text-base font-semibold"
                                >
                                    Bonnie Green
                                </div>
                                <div
                                    class="font-normal text-gray-500"
                                >
                                    bonnie@flowbite.com
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4">Designer</td>
                        <td class="px-6 py-4">
                            <x-status-label active label="Online"/>
                        </td>
                        <td class="px-6 py-4">
                            <a
                                href="#"
                                type="button"
                                data-modal-show="editUserModal"
                                class="font-medium text-blue-600 hover:underline"
                                >Edit user</a
                            >
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b border-gray-200 hover:bg-gray-50"
                    >
                        <th
                            scope="row"
                            class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            <img
                                class="w-10 h-10 rounded-full"
                                src="/docs/images/people/profile-picture-2.jpg"
                                alt="Jese image"
                            />
                            <div class="ps-3">
                                <div
                                    class="text-base font-semibold"
                                >
                                    Jese Leos
                                </div>
                                <div
                                    class="font-normal text-gray-500"
                                >
                                    jese@flowbite.com
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            Vue JS Developer
                        </td>
                        <td class="px-6 py-4">
                            <x-status-label active label="Online"/>
                        </td>
                        <td class="px-6 py-4">
                            <a
                                href="#"
                                type="button"
                                data-modal-show="editUserModal"
                                class="font-medium text-blue-600 hover:underline"
                                >Edit user</a
                            >
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b border-gray-200 hover:bg-gray-50"
                    >
                        <th
                            scope="row"
                            class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            <img
                                class="w-10 h-10 rounded-full"
                                src="/docs/images/people/profile-picture-5.jpg"
                                alt="Jese image"
                            />
                            <div class="ps-3">
                                <div
                                    class="text-base font-semibold"
                                >
                                    Thomas Lean
                                </div>
                                <div
                                    class="font-normal text-gray-500"
                                >
                                    thomes@flowbite.com
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            UI/UX Engineer
                        </td>
                        <td class="px-6 py-4">
                            <x-status-label active label="Online"/>
                        </td>
                        <td class="px-6 py-4">
                            <a
                                href="#"
                                type="button"
                                data-modal-show="editUserModal"
                                class="font-medium text-blue-600 hover:underline"
                                >Edit user</a
                            >
                        </td>
                    </tr>
                    <tr class="bg-white hover:bg-gray-50">
                        <th
                            scope="row"
                            class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            <img
                                class="w-10 h-10 rounded-full"
                                src="/docs/images/people/profile-picture-4.jpg"
                                alt="Jese image"
                            />
                            <div class="ps-3">
                                <div
                                    class="text-base font-semibold"
                                >
                                    Leslie Livingston
                                </div>
                                <div
                                    class="font-normal text-gray-500"
                                >
                                    leslie@flowbite.com
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            SEO Specialist
                        </td>
                        <td class="px-6 py-4">
                            <x-status-label label="Offline"/>
                        </td>
                        <td class="px-6 py-4">
                            <a
                                href="#"
                                type="button"
                                data-modal-show="editUserModal"
                                class="font-medium text-blue-600 hover:underline"
                                >Edit user</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <!--Fin de la tabla-->
    </x-panel>
</x-app-layout>
