<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_of_receipt');
            $table->integer('sample_code_no')->unsigned();
            $table->string('company_name');
            $table->text('sample_description');
            $table->string('sample_sent_to_lab');
            $table->date('result_recorded_on')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('mode')->nullable();
            $table->date('date_of_disposal')->nullable();
            $table->string('payment_details');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('tests');
    }
}
