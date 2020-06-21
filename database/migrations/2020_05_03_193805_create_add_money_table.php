<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_money', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('depositor');
            $table->decimal('amount', 8, 2);
            $table->string('account_type');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *['','','',''];
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_money');
    }
}
