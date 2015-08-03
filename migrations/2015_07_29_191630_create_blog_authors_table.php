<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_authors', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug');
            $table->string('firstname');
            $table->string('lastname');

            $table->timestamps();
        });

        Schema::create('blog_authors_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('blog_author_id');
            $table->string('locale')->index();

            $table->text('info');
        });

        Schema::table('blog_authors_translations', function (Blueprint $table) {
            $table->foreign('blog_author_id')
                ->references('id')->on('blog_authors')
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
        Schema::dropIfExists('blog_authors_translations');
        Schema::dropIfExists('blog_authors');
    }
}
