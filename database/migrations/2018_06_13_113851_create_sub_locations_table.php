<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('location_name')->unique();
            $table->string('description')->nullable();
            $table->string('telephone_no')->nullable();
            $table->text('address')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('sub_locations');
    }
}
