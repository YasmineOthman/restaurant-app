<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salelogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('order_id')->references('id')->on('orders')->constrained()->onDelete('cascade');          
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');          
            $table->foreignId('sale_id')->references('id')->on('sales')->constrained()->onDelete('cascade');          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salelogs');
    }
}
