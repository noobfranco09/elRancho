<?php

namespace App\Livewire\Establo;

use App\Models\Establo;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    protected $model = Establo::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('nombre', 'asc');

        // Centrar encabezados (th) según columna
        $this->setThAttributes(function (Column $column) {
            // para columnas label-only (sin field) usa $column->getTitle()
            if (in_array($column->getTitle(), ['Descripcion', 'Acciones'])) {
                return ['class' => 'text-center'];
            }

            // para columnas con campo puedes usar isField('precio')
            if ($column->isField('descripcion')) {
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

    #[On("establoCreado")]
    #[On("establoEditado")]
    #[On ("establoEliminado")]
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

            Column::make("Estado", "estado")
                ->sortable(),
                
            Column::make('Acciones')  // No se pasa campo de BD
                ->label(function ($row) {
                    return view('components.establos.actions', ['establo' => $row]);
                })
                ->html()
        ];
    }

}
