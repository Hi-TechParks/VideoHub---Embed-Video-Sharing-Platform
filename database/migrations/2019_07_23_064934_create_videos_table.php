<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->string('title', 250)->nullable();
            $table->text('description')->nullable();
            $table->string('image_path', 500)->nullable();
            $table->integer('video_type')->nullable();
            $table->string('video_path', 500)->nullable();
            $table->string('video_id', 1000)->nullable();
            $table->string('duration', 10)->nullable();
            $table->bigInteger('views')->default(0);
            $table->bigInteger('like')->default(0);
            $table->bigInteger('dislike')->default(0);
            $table->date('date')->nullable();
            $table->integer('featured')->default(0);
            $table->integer('quality')->default(0);
            $table->integer('status')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->foreign('category_id')
                  ->references('id')->on('video_categories')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('videos');
    }
}
