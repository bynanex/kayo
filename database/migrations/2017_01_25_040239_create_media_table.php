<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->integer('uploader_id')->unsigned();
            $table->foreign('uploader_id')->references('id')->on('users');
            $table->string('title');
            $table->string('slug', 64);
            $table->unique(['project_id', 'slug']);
            $table->string('summary', 128)->unique();
            $table->text('description');
            $table->string('thumbnail', 64)->nullable();
            $table->string('image_filename', 128)->nullable();
            $table->string('video_filename', 128)->nullable();
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
        Schema::dropIfExists('media');
    }
}
