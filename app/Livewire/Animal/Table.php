<?php

namespace App\Livewire\Animal;

use App\Models\Animal;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{
    protected $model = Animal::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('nombre', 'asc');

        // Centrar encabezados (th) según columna
        $this->setThAttributes(function (Column $column) {
            // para columnas label-only (sin field) usa $column->getTitle()
            if (in_array($column->getTitle(), ['Precio', 'Acciones'])) {
                return ['class' => 'text-center'];
            }

            // para columnas con campo puedes usar isField('precio')
            if ($column->isField('precio')) {
                return ['class' => 'text-center'];
            }

            return [];
        });

        // Centrar celdas (td) según columna y fila
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {

            // Para columnas label-only (ej. 'Acciones') usamos getTitle()
            if ($column->getTitle() === 'Acciones') {
                return ['class' => 'text-center align-middle'];
            }

            return [];
        });
    }


    public function columns(): array
    {
        return [
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),

            Column::make("Precio", "precio")
                ->sortable(),

            Column::make("Sexo", "sexo")
                ->sortable(),
            Column::make('Acciones')  // No se pasa campo de BD
                ->label(function ($row) {
                    return view('components.animales.actions', ['animal' => $row]);
                })
                ->html()
        ];
    }
}
