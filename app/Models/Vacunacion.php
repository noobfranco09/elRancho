<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacunacion extends Model
{
    use SoftDeletes;
    protected $table = "vacunaciones";
    protected $fillable = ["animal_id", "vacunacion_id", "fecha_vacunacion", "vacuna_id"];

    public function vacuna()
    {
        return $this->belongsTo(Vacuna::class, "vacuna_id");
    }
}
