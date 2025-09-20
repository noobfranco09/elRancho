<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    /** @use HasFactory<\Database\Factories\EnfermedadFactory> */
    use HasFactory;

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function animales()
    {
        return $this->belongsToMany(Animal::class, "tratamientos");
    }
}
