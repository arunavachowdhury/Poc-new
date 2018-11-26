<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestItemResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_item_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_id');
            $table->string('UOM');
            $table->string('specified_value');
            $table->string('observed_value');
            $table->string('test_method');
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
        Schema::dropIfExists('test_item_results');
    }
}
