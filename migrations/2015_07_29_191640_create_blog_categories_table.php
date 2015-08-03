<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();
        });

        Schema::create('blog_categories_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('blog_category_id');
            $table->string('locale')->index();

            $table->string('slug');
            $table->string('name');
        });

        Schema::table('blog_categories_translations', function (Blueprint $table) {
            $table->foreign('blog_category_id')
                ->references('id')->on('blog_categories')
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
        Schema::dropIfExists('blog_categories_translations');
        Schema::dropIfExists('blog_categories');
    }
}
