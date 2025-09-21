<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    public function enfermedad()
    {
        return $this->belongsTo(Enfermedad::class, "enfermedades");
    }
}
