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
            $table->string('img')->default('/img/imagen-cumpleanios.png');
            $table->string('nombre');
            $table->string('dia',3);
			$table->string('mes',3);
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
