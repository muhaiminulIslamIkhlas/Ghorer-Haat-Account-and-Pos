<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllProductsTable extends Migration
{
    /**
     * Run the migrations.
     *['','','','stock'];
     * @return void
     */
    public function up()
    {
        Schema::create('all_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->string('name');
            $table->string('price');
            $table->string('stock')->nullable();
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
        Schema::dropIfExists('all_products');
    }
}
