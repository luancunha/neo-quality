<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstruturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estruturas', function (Blueprint $table) {
            $table->id();
            $table->date('dt_estrutura');
            $table->integer('num_incubadora');
            $table->integer('num_rns');
            $table->integer('num_oximetro');
            $table->integer('num_enfermeiro');
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
        Schema::dropIfExists('estruturas');
    }
}
