<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 150)->unique();
            $table->string('slug', 150)->unique();
            $table->text('description')->nullable();
            $table->string('meta_keyword', 500)->nullable();
            $table->text('meta_desc')->nullable();
            $table->integer('home_flag')->nullable();
            $table->bigInteger('views')->default(0);
            $table->integer('status')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('video_categories');
    }
}
