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
            $table->id();
            $table->string('nome_artefato');
            $table->longText('descricao');
            $table->json('perguntas');
            $table->json('respostas');
            $table->bigInteger('pj_id')->unsigned();
            $table->bigInteger('pcs_id')->unsigned();
            $table->timestamps();

            $table->foreign('pj_id')->references('id')->on('projetos');
            $table->foreign('pcs_id')->references('id')->on('processos');
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
