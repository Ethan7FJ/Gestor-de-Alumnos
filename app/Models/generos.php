<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generos extends Model
{
    use HasFactory;

    protected $fillable = ['genero'];

    public function alumno(){
        return $this->hasMany(alumnos::class);
    }
}
