<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('arnswer_id');
            $table->longText('arnswer_description')->nullable();
            $table->float('rank')->unsigned();
            $table->Integer('question_id')->unsigned();
            $table->foreign('question_id')->references('question_id')->on('questions');
            $table->Integer('coach_id')->unsigned();
            $table->foreign('coach_id')->references('coach_id')->on('coaches');
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
        Schema::dropIfExists('answers');
    }
}
