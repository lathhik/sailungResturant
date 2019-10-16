<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsFoodsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods_foods_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_id')->unsigned();
            $table->integer('food_type_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('foods_foods_types', function (Blueprint $table) {
            $table->foreign('food_id')->references('id')->on('foods');
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
        Schema::dropIfExists('foods_foods_types');
    }
}
