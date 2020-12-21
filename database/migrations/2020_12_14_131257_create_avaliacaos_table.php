<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loja');
            $table->unsignedBigInteger('checklist');
            $table->json('respostas');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('loja')->references('id')->on('lojas');
            $table->foreign('checklist')->references('id')->on('checklists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacaos');
    }
}
