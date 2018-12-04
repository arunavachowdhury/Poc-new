<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Symfony\Component\Console\Helper\Table;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sample_id')->unsigned();
            $table->integer('test_item_id')->unsigned();
            $table->float('specified_value');
            $table->float('observed_value')->nullable();
            $table->string('lab_id')->nullable();
            $table->string('is_new');
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->foreign('sample_id')->references('id')->on('samples');
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
        Schema::dropIfExists('jobs');
    }
}
