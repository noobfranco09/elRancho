<?php

namespace App\Livewire\Vacunacion;

use App\Models\Vacuna;
use App\Models\Vacunacion;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Livewire\Attributes\On;

class Table extends DataTableComponent
{
    public $animalId;

    public function builder(): Builder
    {
        return Vacunacion::query()
            ->with('vacuna')
            ->where('animal_id', $this->animalId);
    }

    public function configure(): void
    {
        $this->setDefaultSort('id', 'asc');
        $this->setPrimaryKey("id");
    }

    #[On("vacunacionCreada")]
    #[On("vacunacionEliminada")]
    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable(),
            Column::make('Vacuna', 'vacuna.nombre')
                ->searchable(),
            Column::make("Fecha de vacunacion", "fecha_vacunacion")
                ->sortable()
                ->searchable(),
            Column::make('Descripcion', 'vacuna.descripcion')
                ->searchable(),
            Column::make('Dosis', 'vacuna.dosis')
                ->searchable(),

            Column::make('Acciones')
                ->label(function ($row) {
                    return view('components.vacunaciones.actions', ['vacunacion' => $row]);
                })
        ];
    }
}
