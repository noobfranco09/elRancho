<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
