<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayablePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payable_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->decimal('amount',8,2);
            $table->string('reason');
            $table->integer('payable_id');
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
        Schema::dropIfExists('payable_payments');
    }
}
