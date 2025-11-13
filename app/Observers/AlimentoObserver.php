<?php

namespace App\Observers;

use App\Models\Alimento;
use App\Events\FoodStockLow;

class AlimentoObserver
{
    /**
     * Handle the Alimento "created" event.
     */
    public function created(Alimento $alimento): void
    {
        //
    }

    /**
     * Handle the Alimento "updated" event.
     */
    public function updated(Alimento $alimento): void
    {
        # en este caso es solo para refrescar
        FoodStockLow::dispatch($alimento);
    }

    /**
     * Handle the Alimento "deleted" event.
     */
    public function deleted(Alimento $alimento): void
    {
        //
    }

    /**
     * Handle the Alimento "restored" event.
     */
    public function restored(Alimento $alimento): void
    {
        //
    }

    /**
     * Handle the Alimento "force deleted" event.
     */
    public function forceDeleted(Alimento $alimento): void
    {
        //
    }
}
