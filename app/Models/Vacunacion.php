<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacunacion extends Model
{
    protected $table = "vacunaciones";
    protected $fillable = ["animal_id", "vacunacion_id", "fecha_vacunacion", "vacuna_id"];

    public function vacuna()
    {
        return $this->belongsTo(Vacuna::class, "vacuna_id");
    }
}
