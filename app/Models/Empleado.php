<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{

    protected $fillable = ["name", "password", "fecha_nacimiento", "telefono", "email", "direccion", "rol_id", "estado"];

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
