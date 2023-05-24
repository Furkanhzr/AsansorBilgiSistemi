<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elevators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('elevator_type_id');
            $table->unsignedBigInteger('building_id')->nullable();
            $table->boolean('status')->comment('0-stokta, 1-satıldı')->default(0);
            $table->string('key_code');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('elevator_type_id')->references('id')->on('elevator_types');
            $table->foreign('building_id')->references('id')->on('buildings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elevators');
    }
};
