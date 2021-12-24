<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SelectController extends Controller
{
    public function show()
    {
        $data = DB::table(
            'instituicao as I','alunos as A','cursos as C',
            'Turmas as T','matriculas as M','carga_horaria as CH'
        )
            ->select(
                'T.instituicao_id','T.curso_id','T.professor_id',
                'M.aluno_id','I.nomeInstituicao as Instituicao',
                'C.nomeCurso as Curso','CH.CargaHorariaTotal','A.nomeAluno as Aluno',
                'M.numeroMatricula as Matricula',
            )
            ->join('Turmas as T', 'T.instituicao_id', "=", 'I.IDInstituicao')
            ->join('cursos as C', 'T.curso_id', "=", 'C.IDCurso')
            ->join('matriculas as M', 'M.instituicao_id', "=", 'I.IDInstituicao')
            ->join('alunos as A', 'M.aluno_id', "=", 'A.IDAluno')
            ->join('carga_horaria as CH', 'C.IDCurso', "=", 'CH.cursos_id')
            ->whereIn('T.professor_id', function ($query) {
                $query->select(DB::raw('p.IDProfessor'))
                    ->from('professores as p')
                    ->whereRaw('T.professor_id = P.IDProfessor');
            })
            ->orWhereIn('T.instituicao_id', function ($query) {
                $query->select(DB::raw('i.IDInstituicao'))
                    ->from('instituicao as i')
                    ->whereRaw('T.instituicao_id = I.IDInstituicao ');
            })
            ->orWhereIn('ch.IDCargaHoraria', function ($query) {
                $query->select(DB::raw('g.carga_horaria_id'))
                    ->from('grades as g')
                    ->whereRaw('ch.IDCargaHoraria = g.carga_horaria_id');
            })
            ->groupBy(
                'T.instituicao_id','T.curso_id','T.professor_id',
                'I.nomeInstituicao','M.numeroMatricula','A.nomeAluno',
                'C.nomeCurso','CH.CargaHorariaTotal','M.aluno_id'
            )
            ->having('T.curso_id', "<=", "20")
            ->get();
        $rowCount = $data->count();
        return view('aninhada.index', compact('rowCount'));
    }
}
