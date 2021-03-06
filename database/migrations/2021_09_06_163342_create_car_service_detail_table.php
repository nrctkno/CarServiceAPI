<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarServiceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_service_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_service');
            $table->unsignedBigInteger('type');
            $table->decimal('amount', 8, 2, true);

            $table->foreign('car_service')->references('id')->on('car_service');
            $table->foreign('type')->references('id')->on('service_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_service_detail');
    }
}
