<?php

namespace App\Models;
use App\Models\ {
    Aluno,
    Instituicao
};
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable =['numeroMatricula'];

    public function Aluno() 
    {
        return $this->hasOne(Aluno::class);
    }

    public function Instituicao()
    {
        return $this->hasOne(Instituicao::class);
    }
}
