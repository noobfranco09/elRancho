@if ($status)

    <x-status-label wire:click="changeStatus({{ $rowPrimaryKey }})"  label="Libre" active="1"/>

@else

    <x-status-label wire:click="changeStatus( {{ $rowPrimaryKey }} )"  label="Ocupado" active="0" />

@endif

