<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->id();
            $table->dateTime('created_at');
            $table->unsignedBigInteger('owner');
            $table->string('brand', 20);
            $table->string('model', 20);
            $table->tinyInteger('year', false, true);
            $table->string('plate', 9);
            $table->string('colour', 20);

            $table->foreign('owner')->references('id')->on('owner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car');
    }
}
