<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLike extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
          $table->boolean('like')->default(false);
            $table->boolean('dislike')->default(false);
            $table->Integer('post_id')->unsigned();
            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->Integer('trainee_id')->unsigned();
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
        Schema::dropIfExists('likes');
    }
}
