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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('personas');
            $table->date('fecha_ingreso');
            $table->date('fecha_salida');
            $table->unsignedBigInteger('user_id')->nullable()->constrained();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('client_id', 9)->nullable();
            $table->foreign('client_id')->references('dni')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
