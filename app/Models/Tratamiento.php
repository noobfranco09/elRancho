<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $fillable = ["descripcion", "fecha_prescripcion", "enfermedad_id"];
    public function enfermedad()
    {
        return $this->belongsTo(Enfermedad::class);
    }
}
