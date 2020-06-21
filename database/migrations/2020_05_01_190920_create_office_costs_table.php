<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeCostsTable extends Migration
{
    /**
     * Run the migrations.
     *['','',''];
     * @return void
     */
    public function up()
    {
        Schema::create('office_costs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reason');
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
        Schema::dropIfExists('office_costs');
    }
}
