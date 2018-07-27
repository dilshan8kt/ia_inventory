<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsReceiveNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_receive_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('location_id');
            $table->integer('supplier_id');
            $table->string('code');
            $table->string('invoice_no');
            $table->date('date');
            $table->double('total_amount');
            $table->double('discount_amount')->nullable();
            $table->double('tax_amount')->nullable();
            $table->boolean('is_cancel')->default(0);
            $table->integer('grn_cancel_id')->nullable();
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
        Schema::dropIfExists('goods_receive_notes');
    }
}
