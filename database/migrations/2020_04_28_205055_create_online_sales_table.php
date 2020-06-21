<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineSalesTable extends Migration
{
    /**
     * Run the migrations.
     *'','','','',''
     * @return void
     */
    public function up()
    {
        Schema::create('online_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->string('amount');
            $table->string('cash_type');
            $table->string('due');
            $table->string('due_source');
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
        Schema::dropIfExists('online_sales');
    }
}
