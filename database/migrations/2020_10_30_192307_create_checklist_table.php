<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist', function (Blueprint $table) {
            $table->bigIncrements('cl_id');
            $table->string('cl_nome_artefato');
            $table->longText('cl_descricao');
            $table->json('cl_perguntas');
            $table->json('cl_respostas');
            $table->bigInteger('pj_id')->unsigned();
            $table->bigInteger('pcs_id')->unsigned();
            $table->timestamps();

            $table->foreign('pj_id')->references('pj_id')->on('projetos');
            $table->foreign('pcs_id')->references('pcs_id')->on('processos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist');
    }
}
