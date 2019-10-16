<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('food_name');
            $table->integer('food_price');
            $table->integer('food_type_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('foods', function (Blueprint $table) {
            $table->foreign('food_type_id')->references('id')->on('foods_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
