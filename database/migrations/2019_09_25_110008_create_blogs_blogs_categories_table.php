<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsBlogsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs_blogs_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_id')->unsigned();
            $table->integer('blog_category_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('blogs_blogs_categories', function (Blueprint $table) {
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('CASCADE');
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs_blogs_categories');
    }
}
