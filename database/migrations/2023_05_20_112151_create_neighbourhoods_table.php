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
        Schema::create('neighbourhood', function (Blueprint $table) {
            $table->id('neighbourhood_id');
            $table->string('neighbourhood_title');
            $table->integer('neighbourhood_key');
            $table->integer('neighbourhood_town_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neighbourhood');
    }
};
