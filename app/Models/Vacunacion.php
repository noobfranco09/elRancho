<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacunacion extends Model
{
    protected $table = "vacunaciones";
    protected $fillable = ["animal_id", "vacunacion_id", "fecha_vacunacion"];
    protected $primaryKey = null;

    public $incrementing = false;
    public $timestamps = true;

    public function vacuna()
    {
        $this->belongsTo(Vacuna::class);
    }
}
