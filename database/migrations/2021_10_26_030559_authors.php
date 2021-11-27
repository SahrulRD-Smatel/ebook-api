<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Authors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('date_of_birth', 200);
            $table->string('place_of_birth', 200);
            $table->string('gender', 100);
            $table->string('email', 100);
            $table->string('hp', 30);
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
        Schema::dropIfExists('authors');
    }
}
