<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alimentacion extends Model
{
    protected $table = "alimentaciones";

    protected $fillable = ["animal_id", "alimento_id", "cantidad", "fecha"];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function alimento()
    {
        return $this->belongsTo(Alimento::class);
    }

}
