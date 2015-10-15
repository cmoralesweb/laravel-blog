<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogPostMediaTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_media', function (Blueprint $table) {
            $table->increments('id');

            $table->string('media')->nullable();
            $table->integer('sort');

            $table->integer('blog_post_id')->unsigned();
        });

        Schema::table('blog_post_media', function (Blueprint $table) {
            $table->foreign('blog_post_id')
                ->references('id')->on('blog_posts')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_media');
    }

}
