<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    protected $fillable = ['nombre','cedula','telefono','correo','especialidad'];
    /** @use HasFactory<\Database\Factories\VeterinarioFactory> */
    use HasFactory;
    public function animales()
    {
        return $this->belongsToMany(Animal::class, "revisiones");
    }

       public function revisiones()
    {
        return $this->hasMany(Revision::class, "veterinario_id");
    }
}
