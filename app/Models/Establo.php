<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establo extends Model
{

    protected $fillable = ["nombre", "descripcion", "capacidad", "estado"];
    /** @use HasFactory<\Database\Factories\EstabloFactory> */
    use HasFactory;
   
    protected $table = "establos";

    public function estancos()
    {
        return $this->hasMany(Estanco::class);
    }

}
