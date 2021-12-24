<?php

namespace App\Http\Controllers;
use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::query()->orderby('IDMatricula')->get();
        $matriculasCount = $matriculas->count();
        
        return view('principal.index', compact('matriculasCount'));
    }
}
