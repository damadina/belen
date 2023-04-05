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
        Schema::create('utareas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('descripcion')->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('importante')->default(false);
            $table->string('inicio')->nullable();
            $table->string('fin')->nullable();
            $table->string('ultimaParada')->nullable();
            $table->integer('totalParado')->default(0);
            $table->string('botonIniciar')->default('Iniciar');
            $table->string('botonParar')->default('Parar');
            $table->string('botonFinalizar')->default('Finalizar');
            $table->integer('orden')->default(99);

           $table->foreignId('utrabajo_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utareas');
    }
};
