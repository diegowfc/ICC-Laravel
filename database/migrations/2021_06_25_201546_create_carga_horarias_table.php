<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargaHorariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga_horaria', function (Blueprint $table) {
            $table->integer('IDCargaHoraria');
            $table->string('CargaHorariaTotal');
            $table->integer('cursos_id');

            $table->foreign('cursos_id')->references('IDCurso')->on('cursos');

            $table->primary('IDCargaHoraria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carga_horarias');
    }
}
