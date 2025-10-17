<div>
    <x-modal id="modalVerVeterinario" title="Info Veterinario">
        @php
            $revisionesHeader = ["motivo", "diagnostico", "fecha_revision"]
        @endphp
        <x-table :headings="$revisionesHeader">
            @foreach ($revisiones as $revision)
                <x-table-row>
                    <td>{{ $revision->motivo}}</td>
                    <td>{{ $revision->diagnostico}}</td>
                    <td>{{ $revision->fecha_revision}}</td>
                </x-table-row>
            @endforeach
        </x-table>


        <x-slot:footer>
            <x-button variant="secondary" @click="Livewire.dispatch('closeModal')">
                Cancelar
            </x-button>
        </x-slot:footer>
    </x-modal>
</div>