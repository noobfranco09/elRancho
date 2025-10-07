<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{

    protected $fillable = ["nombre", "cedula", "fecha_nacimiento", "telefono", "correo", "direccion", "rol_id", "estado"];

    /** @use HasFactory<\Database\Factories\EmpleadoFactory> */
    use HasFactory;

    protected $table = "empleados";

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
