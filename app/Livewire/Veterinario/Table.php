<?php

namespace App\Livewire\Veterinario;
use App\Models\Veterinario;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class Table extends DataTableComponent
{
    protected $model = Veterinario::class;

    /*     para cambiar el estado de los registros de la tabla y en la db
     */

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
    public function changeStatus(int $id)
    {
        $item = $this->model::find($id);
        $item->estado = !$item->estado;
        $item->save();
    }


    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'asc');
    }
    #[On('veterinarioCreado')]
    #[On('veterinarioEditado')]
    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Cédula", "cedula")
                ->sortable()
                ->searchable(),
            Column::make("Teléfono", "telefono")
                ->sortable()
                ->searchable(),
            Column::make("Correo", "correo")
                ->sortable()
                ->searchable(),
            Column::make("Especialidad", "especialidad")
                ->sortable()
                ->searchable(),
            BooleanColumn::make("Estado", "estado")//el segundo campo que se le pasa es el de la db
                ->toggleable("changeStatus")
                ->setView("components.veterinarios.estado"),
            Column::make('Acciones')  // No se pasa campo de BD
                ->label(function ($row) {
                    return view('components.veterinarios.actions', ['veterinario' => $row]);
                })
                ->html()
        ];

    }
}
