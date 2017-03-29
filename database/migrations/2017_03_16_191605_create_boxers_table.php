<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->integer('age');
            $table->string('weight');
            $table->integer('win');
            $table->integer('loss');
            $table->integer('ko');
            $table->integer('draw');
            $table->string('image');
            $table->string('country');
            $table->integer('popularity');
            $table->integer('power');
            $table->integer('speed');
            $table->integer('defense');
            $table->integer('offense');
            $table->integer('chin');
            $table->integer('stamina');
            $table->integer('potential');
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
        Schema::dropIfExists('boxers');
    }
}
