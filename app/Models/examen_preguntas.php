<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examen_preguntas extends Model
{
    use HasFactory;

    protected $fillable = ['examen_id','pregunta_id'];

    public function preguntas()
    {
        return $this->belongsToMany(preguntas::class);
    }

    public function examen(){
        return $this->hasMany(examen::class);
    }
}
