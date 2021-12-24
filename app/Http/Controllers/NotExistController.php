<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class NotExistController extends Controller
{
    public function show()
    {
        $data = DB::table('professores as p')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw('t.professor_id'))
                    ->from('turmas as t')
                    ->whereRaw('t.professor_id = p.IDProfessor');
            })
            ->get();

        $rowCount = $data->count();
        return view('NotExists.index', compact('rowCount'));
    }
}
