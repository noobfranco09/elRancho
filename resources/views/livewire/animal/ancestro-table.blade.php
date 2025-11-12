<div>
    @php
        $headers = ["Padre", "Madre"];
    @endphp

    <x-table :headings="$headers" class="sm:rounded-lg" name="myTable">
        <x-table-row>
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                <div class="gap-6 flex justify-center items-center">
                    @if ($padre)
                        <p>{{ $padre->codigo }}</p>
                        <x-button
                            icon="search"
                            color="secondary"
                            :href="route('animales.show', $padre->id)"
                        />
                    @else
                        Sin especificar
                    @endif
                </div>
            </td>

            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                <div class="gap-6 flex justify-center items-center">
                    @if ($madre)
                        <p>{{ $madre->codigo }}</p>
                        <x-button
                            icon="search"
                            color="secondary"
                            :href="route('animales.show', $madre->id)"
                        />
                    @else
                        Sin especificar
                    @endif
                </div>
            </td>
        </x-table-row>
    </x-table>
</div>
