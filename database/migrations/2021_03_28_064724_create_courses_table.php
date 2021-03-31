<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_en');
            $table->string('thumbnail');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('description_en');
            $table->enum('type',['tutorial','course']);
            $table->foreignId('author_id')->references('id')->on('users');
            $table->double('price',8,2)->nullable();
            $table->enum('level',[0,1,2])->default(1);// Beginner Intermediate Expert
            $table->boolean('course_enrolled')->default(false);//the courses attributes
            $table->boolean('course_completed')->default(false);//the courses attributes
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
        Schema::dropIfExists('courses');
    }
}
