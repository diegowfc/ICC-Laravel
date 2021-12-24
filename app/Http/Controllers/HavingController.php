<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HavingController extends Controller
{
    public function show()
    {
        $data = DB::table(
            'professores as P','instituicao as I','alunos as A','cursos as C',
            'Turmas as T','matriculas as M','grades as G','carga_horaria as CH'
        )
            ->select(
                'T.instituicao_id','T.curso_id','T.professor_id','M.aluno_id','I.nomeInstituicao as Instituicao','C.nomeCurso as Curso',
                'G.nomeGrade as Grade','CH.CargaHorariaTotal','P.nomeProfessor as Professor','A.nomeAluno as Aluno',
                'M.numeroMatricula as Matricula',
            )
            ->join('Turmas as T', 'T.professor_id', "=", 'p.IDProfessor')
            ->join('instituicao as I', 'T.instituicao_id', "=", 'I.IDInstituicao')
            ->join('cursos as C', 'T.curso_id', "=", 'C.IDCurso')
            ->join('matriculas as M', 'M.instituicao_id', "=", 'I.IDInstituicao')
            ->join('alunos as A', 'M.aluno_id', "=", 'A.IDAluno')
            ->join('carga_horaria as CH', 'C.IDCurso', "=", 'CH.cursos_id')
            ->join('grades as G', 'CH.IDCargaHoraria', "=", 'G.carga_horaria_id')

            ->groupBy(
                'T.instituicao_id','T.curso_id','T.professor_id','I.nomeInstituicao','M.numeroMatricula',
                'A.nomeAluno','P.nomeProfessor','C.nomeCurso','G.nomeGrade','CH.CargaHorariaTotal','M.aluno_id'
            )
            ->having('T.professor_id', ">=", "49")
            ->orderBy('T.professor_id')
            ->get();
        $rowCount = $data->count();
        return view('having.index', compact('rowCount'));
    }
}
