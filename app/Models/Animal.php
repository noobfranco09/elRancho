<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ["nombre", "codigo", "precio", "imagen", "sexo", "especie_id", "color", "marcas", "fecha_nacimiento", "estado"];
    /** @use HasFactory<\Database\Factories\AnimalFactory> */
    use HasFactory;
    protected $table = "animales";

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
    public function estanco()
    {
        return $this->belongsTo(Estanco::class);
    }
    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }
    public function enfermedades()
    {
        return $this->hasMany(Enfermedad::class);
    }
    public function alquileres()
    {
        return $this->belongsToMany(Alquiler::class, "animales_alquileres");
    }
    public function vacunas()
    {
        return $this->belongsToMany(Vacuna::class, "vacunaciones");
    }
    public function veterinarios()
    {
        return $this->belongsToMany(Veterinario::class, "revisiones");
    }
    public function alimentos()
    {
        return $this->belongsToMany(Alimento::class, "alimentaciones");
    }
}
