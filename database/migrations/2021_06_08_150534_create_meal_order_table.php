<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_order', function (Blueprint $table) {
            // $table->id();
            $table->primary(['meal_id','order_id']);
            // $table->foreignId('meal_id');
            // $table->foreignId('order_id');
              $table->bigInteger('meal_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->foreign('meal_id')
            ->references('id')
            ->on('meals');
         $table->foreign('order_id')
            ->references('id')
            ->on('orders');
            //  $table->integer('quantity');
            $table->timestamps();
            // $table->string('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_order');
    }
}
