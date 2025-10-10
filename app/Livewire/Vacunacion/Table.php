<?php

namespace App\Livewire\Vacunacion;

use App\Models\Vacunacion;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
    public $animalId;

    public function builder(): Builder
    {
        $query = Vacunacion::join("vacunas", "vacunas.id", "=", "vacunaciones.vacuna_id")
            ->select("vacunaciones.*", "vacunas.nombre as vacuna_nombre")
            ->where("vacunaciones.animal_id", $this->animalId);
        return $query;
    }

    public function configure(): void
    {
        $this->setDefaultSort('id', 'asc');
        $this->setPrimaryKey("vacuna_id");
    }

    public function columns(): array
    {

        return [
            Column::make('Vacuna', 'vacuna_nombre'),
            Column::make("Fecha de vacunacion", "fecha_vacunacion")
                ->sortable(),

            Column::make("ID vacuna", "vacuna_id")
                ->sortable(),
        ];
    }
}
