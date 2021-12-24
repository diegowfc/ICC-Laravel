<?php

namespace App\Models;
use App\Models\{
    CargaHoraria,
    Curso
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable =['nomeGrade'];

    public function Curso()
    {
        return $this->hasOne(Curso::class);
    }

    public function CargaHoraria()
    {
        return $this->belongsTo(CargaHoraria::class);
    }
}
