<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fisica_id');
            $table->foreign('fisica_id')->references('id')->on('fisicas');
            $table->date('data_admissao');
            $table->decimal('salario',8,2);
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
        Schema::dropIfExists('personais');
    }
}
