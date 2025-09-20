<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    /** @use HasFactory<\Database\Factories\EmpleadoFactory> */
    use HasFactory;

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
