<?php

namespace App\Observers;

use App\Models\Alimentacion;
use App\Models\Alimento;
use App\Events\FoodStockLow;

class AlimentacionObserver
{
    protected function checkStockAndNotify(Alimento $alimento): void
    {
        if ($alimento->cantidad < 10) {
            FoodStockLow::dispatch($alimento);
        }
    }
    /**
     * Handle the Alimentacion "created" event.
     */
    public function created(Alimentacion $alimentacion): void
    {
        $alimento = Alimento::findOrFail($alimentacion->alimento_id);

        if ($alimento) {
            $alimento->decrement("cantidad", $alimentacion->cantidad);

            $alimento->refresh();
            $this->checkStockAndNotify($alimento);
        }
    }

    /**
     * Handle the Alimentacion "updated" event.
     */
    public function updated(Alimentacion $alimentacion): void
    {
        $oldCantidad = $alimentacion->getOriginal("cantidad");
        $newCantidad = $alimentacion->cantidad;

        $diferencia = $newCantidad - $oldCantidad;

        if ($diferencia !== 0) {
            $alimento = Alimento::findOrFail($alimentacion->alimento_id);
            $alimento->decrement("cantidad", $diferencia);

            $alimento->refresh();
            $this->checkStockAndNotify($alimento);
        }
    }

    /**
     * Handle the Alimentacion "deleted" event.
     */
    public function deleted(Alimentacion $alimentacion): void
    {
        $alimento = Alimento::findOrFail($alimentacion->alimento_id);
        $alimento->increment("cantidad", $alimentacion->cantidad);
    }

    /**
     * Handle the Alimentacion "restored" event.
     */
    public function restored(Alimentacion $alimentacion): void
    {
        //
    }

    /**
     * Handle the Alimentacion "force deleted" event.
     */
    public function forceDeleted(Alimentacion $alimentacion): void
    {
        //
    }
}
