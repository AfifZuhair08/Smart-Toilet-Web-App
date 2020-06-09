<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToiletDispenserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toilet_dispenser', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('dispenserID', 20);
            $table->string('dispenserType', 20);
            $table->string('location', 50);
            $table->mediumText('description');
            $table->string('unitImage')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('toilet_dispenser');
    }
}
