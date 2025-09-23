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
                ->sortable()
        ];
    }
}
