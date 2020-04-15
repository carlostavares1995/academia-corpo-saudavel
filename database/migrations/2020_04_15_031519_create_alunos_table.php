<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fisica_id');
            $table->foreign('fisica_id')->references('id')->on('fisicas');
            $table->integer('matricula');
            $table->string('plano'); // 'Anual', 'Mensal'
            $table->string('pagamento'); // 'À vista', 'Parcelado'
            $table->decimal('valor',8,2);
            $table->date('inicio_contrato');
            $table->date('termino_contrato')->nullable();
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
        Schema::dropIfExists('alunos');
    }
}
