<?php

namespace App\Livewire\Enfermedad;

use App\Models\Enfermedad;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
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
            Column::make("Descripcion", "descripcion")
                ->sortable(),
        ];
    }
}
