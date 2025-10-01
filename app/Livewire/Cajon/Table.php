<?php

namespace App\Livewire\Cajon;

use App\Models\Estanco;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

     protected $model = Estanco::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        // Centrar encabezados (th) según columna
        $this->setThAttributes(function (Column $column) {
            // para columnas label-only (sin field) usa $column->getTitle()
            if (in_array($column->getTitle(), ['Codigo', 'Acciones', "Establo", "Estado", "ID"])) {
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

    #[On("cajonCreado")]
    #[On("cajonEditado")]
    #[On ("cajonEliminado")]
    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),

            Column::make("Codigo", "codigo")
                ->sortable()
                ->searchable(),

            Column::make("Establo", "establo_id")
                ->sortable()
                ->searchable(),

            Column::make("Estado", "estado")
                ->sortable(),
                
            Column::make('Acciones')  // No se pasa campo de BD
                ->label(function ($row) {
                    return view('components.cajones.actions', ['cajon' => $row]);
                })
                ->html()
        ];
    }

}
