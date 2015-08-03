<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_tags', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();
        });

        Schema::create('blog_tags_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('blog_tag_id');
            $table->string('locale')->index();

            $table->string('slug');
            $table->string('name');
        });

        Schema::create('blog_posts_tags', function (Blueprint $table) {
            $table->unsignedInteger('blog_post_id');
            $table->unsignedInteger('blog_tag_id');
        });

        Schema::table('blog_tags_translations', function (Blueprint $table) {
            $table->foreign('blog_tag_id')
                ->references('id')->on('blog_tags')
                ->onDelete('cascade');
        });

        Schema::table('blog_posts_tags', function (Blueprint $table) {
            $table->foreign('blog_post_id')
                ->references('id')->on('blog_posts')
                ->onDelete('cascade');

            $table->foreign('blog_tag_id')
                ->references('id')->on('blog_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts_tags');
        Schema::dropIfExists('blog_tags_translations');
        Schema::dropIfExists('blog_tags');
    }
}
