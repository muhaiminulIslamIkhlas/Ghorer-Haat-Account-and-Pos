<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *['','',''];
     * @return void
     */
    public function up()
    {
        Schema::create('due_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('due_id');
            $table->decimal('amount',8,2);
            $table->string('cash_type');
            $table->date('date');
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
        Schema::dropIfExists('due_payments');
    }
}
