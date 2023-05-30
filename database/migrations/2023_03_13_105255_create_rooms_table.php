<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->integer('capacidad');
            $table->integer('num_habitacion');
            $table->integer('planta')->nullable();
            $table->float('precio');
            $table->unsignedBigInteger('piso_id')->nullable();
            $table->foreign('piso_id')->references('id')->on('floors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room');
    }
};
