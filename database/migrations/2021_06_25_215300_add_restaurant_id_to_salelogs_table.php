<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRestaurantIdToSalelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salelogs', function (Blueprint $table) {
            //
            $table->foreignId('restaurant_id')->references('id')->on('restaurants')->constrained()->onDelete('cascade');          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salelogs', function (Blueprint $table) {
            //
            $table->dropColumn('restaurant_id');
        });
    }
}
