<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estanco extends Model
{
    /** @use HasFactory<\Database\Factories\EstancoFactory> */
    use HasFactory;

    public function establo()
    {
        return $this->belongsTo(Establo::class);
    }
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
