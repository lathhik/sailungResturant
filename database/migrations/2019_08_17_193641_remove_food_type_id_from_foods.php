<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveFoodTypeIdFromFoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foods', function (Blueprint $table) {
//            $table->dropForeign('food_type_id')->references('id')->on('foods_types')->onDelete('CASCADE')->onUpdate('CASCADE');
//            $table->dropColumn('food_type_id');
            $table->dropForeign(['food_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foods', function (Blueprint $table) {
//            $table->dropForeign(['food_type_id']);
            $table->dropColumn(['food_type_id']);
        });

//        Schema::dropIfExists('food_type_id');
    }
}
