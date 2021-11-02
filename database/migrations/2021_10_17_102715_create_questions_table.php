<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->longtext('question');
            $table->integer('points');
            $table->longText('answer1');
            $table->longText('answer2');
            $table->longText('answer3');
            $table->longText('answer4');
            $table->enum('correct', ['answer1', 'answer2', 'answer3', 'answer4']);

            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')
                ->references('id')->on('quizzes')
                ->onDelete('restrict')
                ->onUpdate('restrict');

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
        Schema::dropIfExists('questions');
    }
}
