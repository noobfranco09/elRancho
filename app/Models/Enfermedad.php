<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    /** @use HasFactory<\Database\Factories\EnfermedadFactory> */
    use HasFactory;
    protected $table = "enfermedades";
    protected $fillable = ["animal_id", "fecha", "descripcion", "estado"];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class);
    }
}
