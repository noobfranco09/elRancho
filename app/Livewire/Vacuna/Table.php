<?php

namespace App\Livewire\Vacuna;

use App\Models\Vacuna;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    protected $model = Vacuna::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'asc');
    }

    #[On("vacunaCreada")]
    #[On("vacunaEliminada")]
    #[On("vacunaEditada")]
    public function columns(): array
    {

        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),

            Column::make("Descripcion", "descripcion")
                ->sortable(),

            Column::make("Dosis", "dosis")
                ->sortable(),
            Column::make('Acciones')
                ->label(function ($row) {
                    return view('components.vacuna.actions', ['vacuna' => $row]);
                })
                ->html()
        ];
    }
}
