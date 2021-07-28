<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_courses')->constrained('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->string('progress');
            $table->string('icon');
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
        //
    }
}
