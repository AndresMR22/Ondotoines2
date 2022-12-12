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
        Schema::create('procedimiento_tratamiento', function (Blueprint $table) {
            $table->id();
           $table->integer('cantidad')->nullable();
           $table->unsignedBigInteger('procedimiento_id');
           $table->unsignedBigInteger('tratamiento_id');
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('procedimiento_id')->references('id')->on('procedimientos')->onDelete('cascade')->onUpdate('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedimiento_tratamiento');
    }
};
