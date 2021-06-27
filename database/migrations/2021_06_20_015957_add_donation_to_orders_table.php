<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// <<<<<<< HEAD:database/migrations/2021_06_25_215300_add_restaurant_id_to_salelogs_table.php
// class AddRestaurantIdToSalelogsTable extends Migration

class AddDonationToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
// <<<<<<< HEAD:database/migrations/2021_06_25_215300_add_restaurant_id_to_salelogs_table.php
//         Schema::table('salelogs', function (Blueprint $table) {
//             //
//             $table->foreignId('restaurant_id')->references('id')->on('restaurants')->constrained()->onDelete('cascade');

// =======
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('donation')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
// <<<<<<< HEAD:database/migrations/2021_06_25_215300_add_restaurant_id_to_salelogs_table.php
//         Schema::table('salelogs', function (Blueprint $table) {
//             //
//             $table->dropColumn('restaurant_id');
// =======
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('donation');
        });
    }
}
