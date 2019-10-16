<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('table_name');
            $table->integer('booking_price');
            $table->integer('table_types_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('tables', function (Blueprint $table) {
            $table->foreign('table_types_id')->references('id')->on('table_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
