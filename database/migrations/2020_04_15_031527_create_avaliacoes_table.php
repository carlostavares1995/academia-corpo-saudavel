<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->decimal('altura',5,2);
            $table->decimal('peso',5,2);
            $table->decimal('imc',5,2);
            $table->decimal('braco_relaxado_esq',5,2)->nullable();
            $table->decimal('braco_relaxado_dir',5,2)->nullable();
            $table->decimal('braco_contraido_esq',5,2)->nullable();
            $table->decimal('braco_contraido_dir',5,2)->nullable();
            $table->decimal('antebraco_esq',5,2)->nullable();
            $table->decimal('antebraco_dir',5,2)->nullable();
            $table->decimal('coxa_esq',5,2)->nullable();
            $table->decimal('coxa_dir',5,2)->nullable();
            $table->decimal('panturrilha_esq',5,2)->nullable();
            $table->decimal('panturrilha_dir',5,2)->nullable();
            $table->decimal('torax',5,2)->nullable();
            $table->decimal('ombro',5,2)->nullable();
            $table->decimal('cintura',5,2)->nullable();
            $table->decimal('quadril',5,2)->nullable();
            $table->decimal('gordura',5,2)->nullable();
            $table->decimal('massa_magra',5,2)->nullable();
            $table->date('data_avaliacao');
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
        Schema::dropIfExists('avaliacoes');
    }
}
