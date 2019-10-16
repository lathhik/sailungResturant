<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->integer('user_id')->unsigned();
            $table->integer('table_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('booking_tables', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('customers');
            $table->foreign('table_id')->references('id')->on('tables');
        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_tables');
    }
}
