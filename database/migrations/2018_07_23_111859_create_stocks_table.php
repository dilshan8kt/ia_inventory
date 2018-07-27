<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('location_id');
            $table->integer('product_id');
            $table->integer('price_id');
            $table->double('shelf_qty')->default(0.0);
            $table->double('damage_qty')->default(0.0);
            $table->double('monthly_open_qty');
            $table->double('damage_return_qty')->default(0.0);
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
        Schema::dropIfExists('stocks');
    }
}
