<div class="flex items-center justify-center space-x-2">
    <x-button variant="primary" wire:click="" icon="visibility"/>

    <x-button
        variant="warning"
        @click="$dispatch('openModal', {
            component: 'enfermedad.modal',
            arguments: {
                enfermedad:{{ $enfermedad->id }},
                animal_id: {{ $enfermedad->animal_id }}
            }
        })"
        icon="edit"
    />

    <x-button
        variant="danger"
        @click="$dispatch('openModal', {
            component: 'enfermedad.alert',
            arguments: {
                enfermedad:{{ $enfermedad->id }},
            }
        })"
        icon="delete"
    />
</div>
