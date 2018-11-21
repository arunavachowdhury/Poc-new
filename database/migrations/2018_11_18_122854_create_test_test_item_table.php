<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTestItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_test_item', function (Blueprint $table) {
            $table->integer('test_id')->unsigned();
            $table->integer('test_item_id')->unsigned();

            $table->foreign('test_id')->references('id')->on('tests');
            $table->foreign('test_item_id')->references('id')->on('test_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_test_item');
    }
}
