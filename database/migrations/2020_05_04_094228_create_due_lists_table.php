<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDueListsTable extends Migration
{
    /**
     * Run the migrations.
     *['table_id','','','amount','date'];
     * @return void
     */
    public function up()
    {
        Schema::create('due_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('table_id');
            $table->string('sales_type');
            $table->string('name');
            $table->decimal('amount',8,2);
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
        Schema::dropIfExists('due_lists');
    }
}
