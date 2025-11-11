<?php

namespace App\Livewire\Venta;

use App\Models\Venta;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class Table extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Venta::query()
            ->with(["cliente", "empleado"]);
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Total", "total")
                ->sortable()
                ->format(fn($value, $row, $column) => "$" . intval($value)),
            Column::make("Cliente", "cliente.cedula")
                ->searchable()
                ->format(fn($value, $row, $column) => "C.C  " . $value),
            Column::make("Empleado", "empleado.name")
                ->searchable(),
            Column::make("Fecha de registro", "fecha")
                ->sortable()
                ->format(fn($value) => Carbon::parse($value)->format("d/M/Y")),

            Column::make('Acciones')
                ->label(function ($row) {
                    return view('components.ventas.actions', ['venta' => $row]);
                })
        ];
    }
}
