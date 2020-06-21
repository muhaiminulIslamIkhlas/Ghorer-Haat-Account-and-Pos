<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *['','',''];
     * @return void
     */
    public function up()
    {
        Schema::create('company_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('amount');
            $table->string('date');
            $table->string('cash_type');
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
        Schema::dropIfExists('company_purchases');
    }
}
