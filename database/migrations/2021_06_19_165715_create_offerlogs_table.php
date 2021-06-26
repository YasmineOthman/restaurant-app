<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerlogs', function (Blueprint $table) {
            $table->id();
                        $table->foreignId('restaurant_id')->references('id')->on('restaurants')->constrained()->onDelete('cascade');          

            $table->foreignId('order_id')->references('id')->on('orders')->constrained()->onDelete('cascade');          
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');          
            $table->foreignId('offer_id')->references('id')->on('offers')->constrained()->onDelete('cascade');          

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offerlogs');
    }
}
