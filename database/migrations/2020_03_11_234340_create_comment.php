<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('comment_id');
            $table->longText('comment_description')->nullable();
            $table->float('post_rank')->unsigned()->nullable();
            $table->bigInteger('post_id')->unsigned();
            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->bigInteger('trainee_id')->unsigned();
            $table->foreign('trainee_id')->references('trainee_id')->on('trainees');
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
        Schema::dropIfExists('comments');
    }
}
