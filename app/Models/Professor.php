<?php

namespace App\Models;
use App\Models\ {
    Curso,
    Instituicao
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    public function Instituicao()
    {
        return $this->hasMany(Instituicao::class);
    }

    public function Cursos()
    {
        return $this->hasMany(Curso::class);
    }
}
