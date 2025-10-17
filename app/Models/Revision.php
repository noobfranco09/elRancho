<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $fillable = ['animal_id', 'veterinario_id', 'motivo', 'diagnostico', 'fecha_revision'];

    protected $table = "revisiones";
}

