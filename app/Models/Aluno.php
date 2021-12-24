<?php

namespace App\Models;
use App\Models\ {
    Curso,
    Matricula,
    Instituicao
};
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable =['nomeAluno'];

    public function Curso ()
    {
        return $this->hasMany(Curso::class);
    }

    public function Matricula()
    {
        return $this->hasOne(Matricula::class);
    }

    public function Instituicao()
    {
        return $this->hasOne(Instituicao::class);
    }
}
