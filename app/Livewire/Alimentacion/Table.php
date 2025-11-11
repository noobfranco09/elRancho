<?php

namespace App\Livewire\Alimentacion;

use App\Models\Alimentacion;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;

class Table extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Alimentacion::query()
            ->with(["animal", "alimento"]);
    }

    #[On("alimentacionCreada")]
    #[On("alimentacionEditada")]
    public function columns(): array
    {
        return [

            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Codigo animal", "animal.codigo")
                ->sortable()
                ->searchable(),

            Column::make("Alimento", "alimento.nombre")
                ->sortable(),

            Column::make("Cantidad", "cantidad")
                ->sortable(),

            Column::make("Fecha", "fecha")
                ->sortable()
                ->format(fn($value) => Carbon::parse($value)->format("d/M/Y")),
            Column::make('Acciones')
                ->label(function ($row) {
                    return view('components.alimentos.actions-alimentaciones', ['alimentacion' => $row]);
                })
        ];
    }
}
