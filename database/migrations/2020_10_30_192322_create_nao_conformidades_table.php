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
            $table->bigIncrements('nc_id');
            $table->longText('nc_causa');
            $table->longText('nc_tratativa');
            $table->bigInteger('cplx_id')->unsigned();
            $table->bigInteger('pj_id')->unsigned();
            $table->bigInteger('cl_id')->unsigned();
            $table->integer('nc_escalonada');
            $table->string('nc_responsavel');
            $table->dateTime('nc_data_inicio');
            $table->dateTime('nc_data_fim');
            $table->string('nc_status');
            $table->timestamps();
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
