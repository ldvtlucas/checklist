<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaoConformidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nao_conformidades', function (Blueprint $table) {
            $table->id();
            $table->longText('causa');
            $table->longText('tratativa');
            $table->bigInteger('cplx_id')->unsigned();
            $table->bigInteger('pj_id')->unsigned();
            $table->bigInteger('cl_id')->unsigned();
            $table->integer('escalonada');
            $table->string('responsavel');
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->string('status');
            $table->timestamps();

            $table->foreign('cplx_id')->references('id')->on('complexidades');
            $table->foreign('pj_id')->references('id')->on('projetos');
            $table->foreign('cl_id')->references('id')->on('checklists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nao_conformidades');
    }
}
