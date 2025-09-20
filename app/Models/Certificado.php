<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    public function alquileres()
    {
        return $this->hasMany(Alquiler::class);
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
