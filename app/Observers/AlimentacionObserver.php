<?php

namespace App\Observers;

use App\Models\Alimentacion;
use App\Models\Alimento;

class AlimentacionObserver
{
    /**
     * Handle the Alimentacion "created" event.
     */
    public function created(Alimentacion $alimentacion): void
    {
        $alimento = Alimento::findOrFail($alimentacion->alimento_id);

        if ($alimento) {
            $alimento->decrement("cantidad", $alimentacion->cantidad);
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
