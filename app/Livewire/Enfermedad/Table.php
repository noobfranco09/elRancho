<?php

namespace App\Livewire\Enfermedad;

use App\Models\Enfermedad;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;

class Table extends DataTableComponent
{
    protected $listeners = [
        "enfermedadCreada" => '$refresh',
        "enfermedadEditada" => '$refresh'
    ];
    public $animalId;
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'asc');
    }

    public function builder(): Builder
    {
        return Enfermedad::query()
            ->where("animal_id", $this->animalId);
    }

    public function columns(): array
    {

        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("animal", "animal_id")->hideIf(true),
            DateColumn::make("Fecha", "fecha")
                ->sortable()
                ->outputFormat('d-m-Y'),
            Column::make("Estado", "estado")
                ->sortable(),
            Column::make("Descripcion", "descripcion")
                ->sortable(),
            Column::make('Acciones')
                ->label(function ($row) {
                    return view('components.enfermedades.actions', ['enfermedad' => $row]);
                })
                ->html()
        ];
    }
}
