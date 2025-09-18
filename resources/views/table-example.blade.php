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

            <!--Inicio del modal-->

            <div
                id="editUserModal"
                tabindex="-1"
                aria-hidden="true"
                class="fixed inset-0 z-[60] hidden w-full p-4 h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden"
            >
                <div
                    class="relative w-full max-w-2xl max-h-full"
                >
                    <form
                        class="relative bg-white rounded-2xl border border-primary-100 shadow-xl"
                    >
                        <!-- Header -->
                        <div
                            class="flex items-start justify-between p-4 rounded-t border-b border-primary-100 bg-primary-50/60"
                        >
                            <h3
                                class="text-xl font-semibold text-primary-800"
                            >
                                Edit user
                            </h3>
                            <button
                                type="button"
                                class="text-primary-700/70 hover:text-primary-800 hover:bg-primary-100 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center focus:outline-none focus:ring-2 focus:ring-primary-300"
                                data-modal-hide="editUserModal"
                                aria-label="Close"
                            >
                                <svg
                                    class="w-3 h-3"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 14 14"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                    />
                                </svg>
                                <span class="sr-only"
                                    >Close modal</span
                                >
                            </button>
                        </div>

                        <!-- Body -->
                        <div class="p-6 space-y-6">
                            <div
                                class="grid grid-cols-6 gap-6"
                            >
                                <!-- Campo -->
                                <div
                                    class="col-span-6 sm:col-span-3"
                                >
                                    <label
                                        for="first-name"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >First Name</label
                                    >
                                    <input
                                        type="text"
                                        id="first-name"
                                        name="first-name"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Bonnie"
                                        required
                                    />
                                </div>

                                <div
                                    class="col-span-6 sm:col-span-3"
                                >
                                    <label
                                        for="last-name"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >Last Name</label
                                    >
                                    <input
                                        type="text"
                                        id="last-name"
                                        name="last-name"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Green"
                                        required
                                    />
                                </div>

                                <div
                                    class="col-span-6 sm:col-span-3"
                                >
                                    <label
                                        for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >Email</label
                                    >
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="example@company.com"
                                        required
                                    />
                                </div>

                                <div
                                    class="col-span-6 sm:col-span-3"
                                >
                                    <label
                                        for="phone-number"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >Phone Number</label
                                    >
                                    <input
                                        type="number"
                                        id="phone-number"
                                        name="phone-number"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="e.g. +(12)3456 789"
                                        required
                                    />
                                </div>

                                <div
                                    class="col-span-6 sm:col-span-3"
                                >
                                    <label
                                        for="department"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >Department</label
                                    >
                                    <input
                                        type="text"
                                        id="department"
                                        name="department"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Development"
                                        required
                                    />
                                </div>

                                <div
                                    class="col-span-6 sm:col-span-3"
                                >
                                    <label
                                        for="company"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >Company</label
                                    >
                                    <input
                                        type="number"
                                        id="company"
                                        name="company"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="123456"
                                        required
                                    />
                                </div>

                                <div
                                    class="col-span-6 sm:col-span-3"
                                >
                                    <label
                                        for="current-password"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >Current
                                        Password</label
                                    >
                                    <input
                                        type="password"
                                        id="current-password"
                                        name="current-password"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="••••••••"
                                        required
                                    />
                                </div>

                                <div
                                    class="col-span-6 sm:col-span-3"
                                >
                                    <label
                                        for="new-password"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >New Password</label
                                    >
                                    <input
                                        type="password"
                                        id="new-password"
                                        name="new-password"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="••••••••"
                                        required
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div
                            class="flex items-center justify-end gap-3 p-6 border-t border-primary-100 rounded-b"
                        >
                            <button
                                type="button"
                                data-modal-hide="editUserModal"
                                class="px-5 py-2.5 text-sm font-medium rounded-lg text-primary-700 hover:text-primary-800 bg-primary-50 hover:bg-primary-100 focus:outline-none focus:ring-2 focus:ring-primary-300"
                            >
                                Cancel
                            </button>

                            <button
                                type="submit"
                                class="px-5 py-2.5 text-sm font-medium rounded-lg text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-4 focus:ring-primary-300"
                            >
                                Save all
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!--Fin del modal-->
        </div>
        <!--Fin de la tabla-->
    </x-panel>
</x-app-layout>
