<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Celda;

class Lectura extends Model
{
    use HasFactory;
    public function celdas()
    {
        return $this->hasMany(Celda::class,'lectura_id');
    }

}
