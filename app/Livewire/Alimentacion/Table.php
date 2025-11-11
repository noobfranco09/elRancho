<?php

namespace App\Livewire\Alimentacion;

use App\Models\Alimentacion;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
    protected $model = Alimentacion::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [

            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Animal", "animal_id")
                ->sortable()
                ->searchable(),

            Column::make("Alimento", "alimento_id")
                ->sortable(),

            Column::make("Fecha", "fecha")
                ->sortable(),
            /* Column::make('Acciones') */
            /*     ->label(function ($row) { */
            /*         return view('components.vacuna.actions', ['vacuna' => $row]); */
            /*     }) */
            /*     ->html() */
        ];

    }
}
