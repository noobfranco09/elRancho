<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estanco extends Model
{
    /** @use HasFactory<\Database\Factories\EstancoFactory> */
    protected $fillable = ["codigo", "establo_id", "estado"];

    use HasFactory;
    use SoftDeletes;
    
    protected $table = "estancos";

    public function establo()
    {
        return $this->belongsTo(Establo::class);
    }
    public function animales()
    {
        return $this->hasMany(Animal::class);
    }
}
