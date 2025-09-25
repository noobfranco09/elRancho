<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{

    protected $fillable = ["nombre", "descripcion", "dosis"];
    /** @use HasFactory<\Database\Factories\VacunaFactory> */
    use HasFactory;

    public function animales()
    {
        return $this->belongsToMany(Animal::class, "vacunaciones");
    }
}
