<?php

namespace App\Livewire\Venta;

use App\Models\Animal;
use App\Models\Especie;
use App\Models\Venta;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Str;

class TableroAnimales extends Component
{
    public $cliente;

    public $animales = [];
    public $especies = [];
    public $activeTab = null;
    public $searchQuery = "";
    public Collection $selectedAnimals;

    public function mount($cliente)
    {
        $this->animales = Animal::select(
            "id",
            "nombre",
            "precio",
            "imagen",
            "sexo",
            "color"

        )->whereNull("venta_id")->get();

        $this->especies = Especie::pluck("nombre", "id");;
        $this->cliente = $cliente;
        $this->activeTab = $this->especies[0] ?? "";
        $this->selectedAnimals = collect();
    }

    public function getFilteredAnimalsProperty()
    {
        $collection = collect($this->animales);

        if ($this->activeTab) {
            $collection = $collection->where("especie_id", $this->activeTab);
        }

        if ($this->searchQuery) {
            $query = mb_strtolower($this->searchQuery);

            $collection = $collection->filter(
                fn($animal) =>
                mb_strpos($animal["nombre"], $query) !== false
            );
        }

        return $collection->values()->all();
    }

    public function addToCart($id)
    {

        foreach ($this->selectedAnimals as $animal) {
            if (isset($animal["id"]) && $animal["id"] == $id) {
                return;
            }
        }

        $found = collect($this->animales)->firstWhere("id", (int) $id);

        if ($found) {
            $this->selectedAnimals[] = $found;
        }
    }

    public function removeFromCart($id)
    {
        $this->selectedAnimals = $this->selectedAnimals->reject(
            fn($animal) => $animal->id === $id
        );
    }

    # Antes de abrir el modal verifica si hay
    # items en el carrito
    public function confirmRegister()
    {
        if (count($this->selectedAnimals) === 0) {
            $this->dispatch("error", message: "No hay animales seleccionados");
            return;
        }

        $this->dispatch("openModal", 'venta.modal-registrar');
    }

    public function setActiveTab($especieId)
    {
        $this->activeTab = $especieId;
    }

    function getTotal(Collection $selectedAnimals)
    {
        return $selectedAnimals->reduce(function ($total, $animal) {
            return $total + $animal->precio;
        }, 0);
    }

    #[On("registrarVenta")]
    public function register()
    {
        try {
            if (!Auth::check()) {
                throw new Exception("El usuario no esta loggeado");
            }


            DB::transaction(function () {
                $total = $this->getTotal($this->selectedAnimals);

                $venta_nueva = Venta::create([
                    "codigo" => Str::uuid(),
                    "fecha" => Carbon::now(),
                    "total" => $total,
                    "cliente_id" => $this->cliente->id,
                    "empleado_id" => Auth::user()->id,
                ]);

                $ids_animales = $this->selectedAnimals
                    ->pluck("id")
                    ->toArray();

                Animal::whereIn("id", $ids_animales)
                    ->update([
                        "venta_id" => $venta_nueva->id
                    ]);

                $this->animales = collect($this->animales)->reject(fn ($animal) =>
                    in_array($animal->id, $ids_animales)
                );
            });

            $this->dispatch("ventaRegistrada", message: "Venta creada con exito");
            $this->dispatch("closeModal", 'venta.modal-registrar');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch("error", message: "Error al registrar la venta");
        }
    }

    public function render()
    {
        return view('livewire.venta.tablero-animales');
    }
}
