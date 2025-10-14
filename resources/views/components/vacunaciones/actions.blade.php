<div class="flex items-center justify-center space-x-2">
    <x-button
        variant="danger"
        @click="$dispatch('openModal', {
            component: 'vacunacion.alert',
            arguments: {
                vacunacion:{{ $vacunacion->id }},
            }
        })"
        icon="delete"
    />
</div>
