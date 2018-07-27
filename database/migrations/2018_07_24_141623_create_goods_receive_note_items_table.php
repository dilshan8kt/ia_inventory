<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsReceiveNoteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_receive_note_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grn_id');
            $table->integer('product_id');
            $table->double('qty');
            $table->double('free_qty')->nullable();
            $table->double('unit_price');
            $table->double('sales_price');
            $table->double('discount')->nullable();
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
        Schema::dropIfExists('goods_receive_note_items');
    }
}
