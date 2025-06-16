<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examen extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function preguntas()
    {
        return $this->belongsToMany(preguntas::class);
    }

    public function alumno(){
        return $this->hasMany(alumnos::class);
    }
}
