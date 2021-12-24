<?php

namespace App\Models;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Model;

class CargaHoraria extends Model
{
    protected $fillable =['CargaHorariaTotal'];

    public function Curso()
    {
        return $this->hasOne(Curso::class); 
    }
}
