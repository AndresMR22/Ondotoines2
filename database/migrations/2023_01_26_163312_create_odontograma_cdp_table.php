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
        Schema::create('odontograma_cdp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('odontograma_id');// 1
            $table->unsignedBigInteger('cdp_id');// 1          
            $table->foreign('odontograma_id')->references('id')->on('odontogramas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cdp_id')->references('id')->on('cara_diente_proceso')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('odontograma_cdp');
    }
};
