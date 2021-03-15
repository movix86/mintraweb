<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCumpleaniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cumpleanios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img')->default('Slides_FrasesOAR-12Marzo.jpg');
            $table->string('nombre');
            $table->string('fecha');
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
        Schema::dropIfExists('cumpleanios');
    }
}
