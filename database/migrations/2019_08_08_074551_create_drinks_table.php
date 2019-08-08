<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('drink_name');
            $table->string('drink_price');
            $table->integer('drink_type_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('drinks', function (Blueprint $table) {
            $table->foreign('drink_type_id')->references('id')->on('drinks_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
}
