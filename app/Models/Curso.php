<?php

namespace App\Models;
use App\Models\{
    CargaHoraria,
    Grade,
    Professor
};
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable =['cursoNome'];

    public function CargaHoraria()
    {
        return $this->hasOne(CargaHoraria::class);
    }

    public function Grade()
    {
        return $this->hasOne(Grade::class);
    }
    
    public function Professor()
    {
        return $this->hasMany(Professor::class);
    }

    public function Instituicao()
    {
        return $this->hasMany(Instituicao::class);
    }

    public function Aluno()
    {
        return $this->belongsToMany(Aluno::class);
    }
}
