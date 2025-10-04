<?php

namespace App\Livewire\Animal;

use App\Models\Animal;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;

class Table extends DataTableComponent
{
    protected $model = Animal::class;

    public function bulkActions(): array
    {
        return [
            'cambiarEstadoSeleccionados' => 'Cambiar estado',
        ];
    }


    public function cambiarEstadoSeleccionados()
    {
        foreach ($this->getSelected() as $item) {
            $this->changeStatus($item);
        }
        $this->clearSelected();
    }

    public function configure(): void
    {
        $this->setHideBulkActionsWhenEmptyStatus(true);
        $this->setActionsInToolbarEnabled();
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


    #[On("animalEditado")]
    #[On("animalCreado")]
    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Precio", "precio")
                ->sortable(),
            Column::make("Sexo", "sexo")
                ->sortable(),
            DateColumn::make('Nacimiento', 'fecha_nacimiento')
                ->outputFormat('d-m-Y H:i:s')
                ->sortable(),
            BooleanColumn::make("Estado", "estado")
                ->setView("components.animales.estado"),
            Column::make('Acciones')  // No se pasa campo de BD
                ->label(function ($row) {
                    return view('components.animales.actions', ['animal' => $row]);
                })
                ->html()
        ];
    }

    public function changeStatus(int $id)
    {
        $item = $this->model::find($id);
        $item->estado = !$item->estado;
        $item->save();
    }
}
