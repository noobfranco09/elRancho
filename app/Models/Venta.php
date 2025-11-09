<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    /** @use HasFactory<\Database\Factories\VentaFactory> */
    use HasFactory;

    protected $fillable = ["codigo", "total", "fecha", "cliente_id", "empleado_id"];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
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
