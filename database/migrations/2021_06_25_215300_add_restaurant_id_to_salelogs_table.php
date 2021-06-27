<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRestaurantIdToSalelogsTable extends Migration
// class AddDonationToOrdersTable extends Migration
// >>>>>>> 1e239e25bd82ced27c12c58700dc88eca4296050:database/migrations/2021_06_20_015957_add_donation_to_orders_table.php
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

//         Schema::table('orders', function (Blueprint $table) {
//             $table->integer('donation')->default(0);
// >>>>>>> 1e239e25bd82ced27c12c58700dc88eca4296050:database/migrations/2021_06_20_015957_add_donation_to_orders_table.php
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
//         Schema::table('orders', function (Blueprint $table) {
//             $table->dropColumn('donation');
// >>>>>>> 1e239e25bd82ced27c12c58700dc88eca4296050:database/migrations/2021_06_20_015957_add_donation_to_orders_table.php
        });
    }
}
