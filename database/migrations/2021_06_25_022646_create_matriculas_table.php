<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->integer('IDMatricula');
            $table->string('numeroMatricula');
            $table->integer('aluno_id');
            $table->integer('instituicao_id');

            $table->primary('IDMatricula');

            $table->foreign('aluno_id')->references('IDAluno')->on('alunos');
            $table->foreign('instituicao_id')->references('IDInstituicao')->on('instituicao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
