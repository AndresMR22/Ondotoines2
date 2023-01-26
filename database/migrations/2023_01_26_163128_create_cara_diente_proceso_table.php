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
        Schema::create('cara_diente_proceso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cara_id');
            $table->unsignedBigInteger('diente_id');
            $table->unsignedBigInteger('proceso_id');       
            $table->foreign('cara_id')->references('id')->on('caras');
            $table->foreign('diente_id')->references('id')->on('dientes');
            $table->foreign('proceso_id')->references('id')->on('procesos');
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
        Schema::dropIfExists('cara_diente_proceso');
    }
};
