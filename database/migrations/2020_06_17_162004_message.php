<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Message extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->string('contenu');
            $table->dateTime('created_at');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('sujetId');
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('sujetId')->references('id')->on('sujets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message');
    }
}
