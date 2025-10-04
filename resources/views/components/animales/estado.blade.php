@if ($status)

    <x-status-label wire:click="changeStatus({{ $rowPrimaryKey }})"  label="Activo" active="1"/>

@else

    <x-status-label wire:click="changeStatus( {{ $rowPrimaryKey }} )"  label="Inactivo" active="0" />

@endif

