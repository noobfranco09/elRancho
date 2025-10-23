<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;


    class Inventario extends Model
    {
        protected $fillable = ['id', 'nombre', 'cantidad', 'estado',];
        protected $table = "inventarios";

        /** @use HasFactory<\Database\Factories\InventarioFactory> */
        use HasFactory;
    }
