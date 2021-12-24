<?php

use App\Http\Controllers\{
    AlunoController,
    MatriculaController,
    JoinController,
    UnionController,
    HavingController,
    SelectController,
    NotExistController,
    ExistsController
};
use Illuminate\Support\Facades\Route;

Route::get('/matriculas', [MatriculaController::class, 'index'])->name('listar_matriculas');

Route::get('/matriculas/{matriculaID}/alunos', [AlunoController::class, 'index'])->name('listar_alunos');

Route::get('/show', [JoinController::class, 'show'])->name('join_tables');

Route::get('/union', [UnionController::class, 'show'])->name('union');

Route::get('/having', [HavingController::class, 'show'])->name('having');

Route::get('/aninhada', [SelectController::class, 'show'])->name('aninhada');

Route::get('/NotExist', [NotExistController::class, 'show'])->name('NotExist');

Route::get('/Exists', [ExistsController::class, 'show'])->name('Exists');
