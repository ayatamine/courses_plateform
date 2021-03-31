<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('video_id')->nullable()->references('id')->on('videos');
            $table->foreignId('post_id')->nullable()->references('id')->on('posts');
            $table->tinyInteger('vote_number');
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
