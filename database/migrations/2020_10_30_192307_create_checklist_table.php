<?php

use Illuminate\Database\Eloquent\SoftDeletes;
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
        Schema::create('checklists', function (Blueprint $table) {
            $table->SoftDeletes();
            $table->id();
            $table->string('nome_artefato');
            $table->longText('descricao')->nullable();
            $table->json('perguntas');
            $table->json('respostas')->nullable();
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
