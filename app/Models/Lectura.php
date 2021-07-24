<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Celda;
use App\Models\Urbanizacion;


class Lectura extends Model
{
    use HasFactory;
    public function celdas()
    {
        return $this->hasMany(Celda::class,'lectura_id');
    }
    public function urbanizacion()
    {
        return $this->belongsTo(Urbanizacion::class,'urbanizacion_id');
    }

}
