<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gameanswers', function (Blueprint $table) {
            $table->id();
            $table->foreign('game_id')
                ->references('id')->on('games')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('answer_id')
                ->references('id')->on('answers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('gameanswers');
    }
}
