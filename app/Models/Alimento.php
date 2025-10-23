<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    /** @use HasFactory<\Database\Factories\AlimentoFactory> */
    use HasFactory;
    protected $fillable = ['id', 'nombre', 'observaciones','precio','unidad','cantidad', 'estado',];
    protected $table = "alimentos";
    public function animales()
    {
        return $this->belongsToMany(Animal::class, "alimentaciones");
    }
}
