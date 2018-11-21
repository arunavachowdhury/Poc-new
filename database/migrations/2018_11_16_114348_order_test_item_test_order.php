<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderTestItemTestOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_test_item_test_order', function (Blueprint $table) {
            $table->integer('test_order_id')->unsigned();
            $table->integer('order_test_item_id')->unsigned();

            $table->foreign('test_order_id')->references('id')->on('test_orders');
            $table->foreign('order_test_item_id')->references('id')->on('order_test_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
