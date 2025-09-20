<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    /** @use HasFactory<\Database\Factories\VentaFactory> */
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function certificado()
    {
        return $this->belongsTo(Certificado::class);
    }
    public function empleados()
    {
        return $this->belongsTo(Empleado::class);
    }
    public function animales()
    {
        return $this->hasMany(Animal::class);
    }
}
