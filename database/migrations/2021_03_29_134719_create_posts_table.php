<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_en');
            $table->string('slug')->unique();
            $table->string('thumbnail');
            $table->longText('content');
            $table->longText('content_en');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->index(['title','title_en']);
            $table->integer('postable_id');
            $table->string("postable_type");
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
        Schema::dropIfExists('posts');
    }
}
