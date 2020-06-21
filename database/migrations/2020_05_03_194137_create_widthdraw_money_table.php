<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidthdrawMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widthdraw_money', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('amount', 8, 2);
            $table->date('date');
            $table->string('account_type');
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
        Schema::dropIfExists('widthdraw_money');
    }
}
