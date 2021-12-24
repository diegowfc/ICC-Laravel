<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ExistsController extends Controller
{
    public function show()
    {
        $data = DB::table('instituicao as i')
            ->select(DB::raw('*'))
            ->crossJoin('cursos as c')
            ->crossJoin('alunos as a')
            ->crossJoin('professores as p')
            ->crossJoin('matriculas as m')
            ->crossJoin('turmas as t')
            ->whereRaw('t.instituicao_id = i.IDInstituicao')
            ->whereRaw('t.aluno_id = a.IDAluno')
            ->whereRaw('t.professor_id = p.IDProfessor')
            ->whereRaw('t.curso_id = c.IDCurso')
            ->whereRaw('m.aluno_id = a.IDAluno')
            ->where('i.IDInstituicao', '<=', 4)
            ->get();

        $rowCount = $data->count();
    
        return view('exists.index', compact('rowCount'));
    }
}
