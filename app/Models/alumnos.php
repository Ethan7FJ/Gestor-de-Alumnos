<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumnos extends Model
{
    use HasFactory;

    protected $fillable = ['nombres','apellidos','edad','genero_id','correo','direccion','examen_id'];

    public function genero()
    {
        return $this->belongsTo(generos::class);
    }

    public function examen()
    {
        return $this->belongsTo(examen::class);
    }
}
