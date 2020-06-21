<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountPayablesTable extends Migration
{
    /**
     * Run the migrations.
     *['','','',''];
     * @return void
     */
    public function up()
    {
        Schema::create('account_payables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->decimal('amount',8,2);
            $table->string('reason');
            $table->string('payable_type');
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
        Schema::dropIfExists('account_payables');
    }
}
