<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    /** @use HasFactory<\Database\Factories\AlquilerFactory> */
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function certificado()
    {
        return $this->belongsTo(Certificado::class);
    }
}
