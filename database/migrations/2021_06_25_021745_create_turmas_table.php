<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Turmas', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('instituicao_id');
            $table->integer('professor_id');
            $table->integer('aluno_id');
            $table->integer('curso_id');
            
            $table->foreign('instituicao_id')->references('IDInstituicao')->on('instituicao');
            $table->foreign('professor_id')->references('IDProfessor')->on('professores');         
            $table->foreign('aluno_id')->references('IDAluno')->on('alunos');
            $table->foreign('curso_id')->references('IDCurso')->on('cursos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
