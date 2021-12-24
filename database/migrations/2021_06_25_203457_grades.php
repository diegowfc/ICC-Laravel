<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Grades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->integer('IDGrade');
            $table->string('nomeGrade');
            $table->integer('carga_horaria_id');
            $table->integer('cursos_id');

            $table->foreign('cursos_id')->references('IDCurso')->on('cursos');
            $table->foreign('carga_horaria_id')->references('IDCargaHoraria')->on('carga_horaria');

            $table->primary('IDGrade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
