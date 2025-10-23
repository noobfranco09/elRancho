<?php

namespace App\Livewire\Alimentos;
use App\Models\Alimento;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Livewire\Component;


class Table extends DataTableComponent
{
    protected $model = Alimento::class;

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
    #[On('alimentoCreado')]
    #[On('alimentoEditado')]
    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Observaciones", "observaciones")
                ->sortable()
                ->searchable(),
            Column::make("Precio", "precio")
                ->sortable()
                ->searchable(),
            Column::make("Unidad", "unidad")
                ->sortable()
                ->searchable(),
            Column::make("Cantidad", "cantidad")
                ->sortable()
                ->searchable(),
            BooleanColumn::make("Estado", "estado")//el segundo campo que se le pasa es el de la db
                ->toggleable("changeStatus")
                ->setView("components.alimentos.estado"),
            Column::make('Acciones')  // No se pasa campo de BD
                ->label(function ($row) {
                    return view('components.alimentos.actions', ['alimento' => $row]);
                })
                ->html()
        ];

    }
}
