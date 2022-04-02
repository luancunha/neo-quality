<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosInternacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_internacaos', function (Blueprint $table) {
            $table->id();
            $table->integer('cod_internacao')->unsigned();
            $table->foreign('cod_internacao')->references('id')->on('internacaos');
            $table->date('data');
            $table->integer('peso');
            $table->integer('tamanho');
            $table->boolean('boo_sufarctante');
            $table->integer('sufarctante');
            $table->boolean('boo_antibiotico');
            $table->integer('antibiotico');
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
        Schema::dropIfExists('dados_internacaos');
    }
}
