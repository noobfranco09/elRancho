<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacuna extends Model
{

    protected $fillable = ["nombre", "descripcion", "dosis"];
    /** @use HasFactory<\Database\Factories\VacunaFactory> */
    use HasFactory;
    use SoftDeletes;


    public function animales()
    {
        return $this->belongsToMany(Animal::class, "vacunaciones");
    }
}
