<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UnionController extends Controller
{
    public function show()
    {
        $time_start = microtime(true);

        $first = DB::table('cursos as c')
            ->select('c.IDCurso', 'p.IDProfessor', 'i.IDinstituicao', 'a.IDAluno')
            ->crossJoin('professores as p')
            ->crossJoin('instituicao as i')
            ->crossJoin('alunos as a')
            ->where('c.IDCurso', '>', 394);

        $data = DB::table('turmas as t')
            ->select('t.curso_id', 't.professor_id', 't.instituicao_id', 't.aluno_id')
            ->join('cursos as c', 'c.IDCurso', '=', 't.curso_id')
            ->join('instituicao as i', 'i.IDInstituicao', '=', 't.instituicao_id')
            ->join('professores as p', 'p.IDProfessor', '=', 't.professor_id')
            ->join('alunos as a', 'a.IDAluno', '=', 't.aluno_id')
            ->unionAll($first)
            ->where('c.IDCurso', '<', 20)
            ->get();
            
        $rowCount = $data->count();
        return view('union.index', compact('rowCount'));
    }
}
