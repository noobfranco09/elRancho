<?php

namespace App\Livewire\Veterinario;
use App\Models\Veterinario;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
    protected $model = Veterinario::class;
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'asc');
    }
    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Cédula", "cedula")
                ->sortable()
                ->searchable(),
            Column::make("Teléfono", "telefono")
                ->sortable()
                ->searchable(),
            Column::make("Correo", "correo")
                ->sortable()
                ->searchable(),
            Column::make("Especialidad", "especialidad")
                ->sortable()
                ->searchable()
        ];

    }
}
