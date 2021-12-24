<?php

namespace App\Models;
use App\Models\{
    Aluno,
    Matricula,
    Curso,
    Professor
};

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $fillable =['nomeInstituicao'];

    public function Matricula()
    {
        return $this->belongsTo(Matricula::class);
    }

    public function Aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function Cursos()
    {
        return $this->belongsToMany(Curso::class);
    }

    public function Professor()
    {
        return $this->belongsToMany(Professor::class);
    }
}
