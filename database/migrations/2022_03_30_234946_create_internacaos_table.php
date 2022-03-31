<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internacaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('mae');
            $table->string('sexo');
            $table->string('tipo_parto');
            $table->integer('tmp_gestacao');
            $table->integer('peso');
            $table->integer('leito');
            $table->integer('tamanho');
            $table->date('dt_internacao');
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
        Schema::dropIfExists('internacaos');
    }
}
