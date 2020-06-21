<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseOthersTable extends Migration
{
    /**
     * Run the migrations.
     *['name','amount','',''];
     * @return void
     */
    public function up()
    {
        Schema::create('expense_others', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('amount');
            $table->string('cash_type');
            $table->string('date');
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
        Schema::dropIfExists('expense_others');
    }
}
