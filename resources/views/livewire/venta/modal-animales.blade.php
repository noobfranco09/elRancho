
<div>
    <x-modal
        id="modal-animal"
        title="Animales de la venta"
    >

        @php
            $headers = ["Código", "especie", "Precio", "Ver"];
        @endphp

        <x-table :headings="$headers">
            @foreach ($animales as $animal)
                <x-table-row>
                    <td>{{ $animal->codigo }}</td>
                    <td>{{ $animal->especie ?? "sin especie" }}</td>
                    <td>${{ $animal->precio }}</td>
                    <td class="p-3">
                        <x-button icon="search" :href="route('animales.show', $animal->id)"/>
                    </td>
                </x-table-row>

            @endforeach
        </x-table>

        <x-slot:footer>

            <x-button variant="secondary"  @click="Livewire.dispatch('closeModal')" >
                Cancelar
            </x-button>

            <x-button variant="primary" form="form-animal" wire:click="save">
                Guardar
            </x-button>

        </x-slot:footer>
    </x-modal>
</div>
