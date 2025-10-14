<?php

namespace App\Livewire\Empleado;

use App\Models\Empleado;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;

class Table extends DataTableComponent
{
    protected $model = Empleado::class;

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

    #[On("empleadoCreado")]
    #[On("empleadoEditado")]
    #[On ("empleadoEliminado")]
    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),

            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
                
            DateColumn::make("Fecha Nacimiento", "fecha_nacimiento")
                ->outputFormat('d-m-Y')
                ->sortable(),
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
            
            Column::make("Rol", "rol_id")
                ->sortable(),

            BooleanColumn::make("Estado", "estado")
                ->toggleable("changeStatus")
                ->setView("components.empleados.estado"),
                
            Column::make('Acciones')  // No se pasa campo de BD
                ->label(function ($row) {
                    return view('components.empleados.actions', ['empleado' => $row]);
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
