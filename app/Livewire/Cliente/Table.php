<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class Table extends DataTableComponent
{
    protected $model = Cliente::class;

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

    #[On("clienteCreado")]
    #[On("clienteEditado")]
    #[On ("clienteEliminado")]
    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),

            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
                
            Column::make("Cedula", "cedula")
                ->sortable()
                ->searchable(),

            Column::make("Telefono", "telefono")
                ->sortable()
                ->searchable(),

            Column::make("Correo Electronico", "correo")
                ->sortable()
                ->searchable(),
            
            Column::make("Direccion", "direccion")
                ->sortable(),

            BooleanColumn::make("Estado", "estado")
                ->toggleable("changeStatus")
                ->setView("components.clientes.estado"),
                
            Column::make('Acciones')  // No se pasa campo de BD
                ->label(function ($row) {
                    return view('components.clientes.actions', ['cliente' => $row]);
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
