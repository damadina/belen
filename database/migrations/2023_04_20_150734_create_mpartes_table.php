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
        Schema::create('mpartes', function (Blueprint $table) {
            $table->id();
            $table->string('tarea')->nullable();
            $table->integer('tiempoEstimado')->nullable();

            $table->string('lunes')->nullable();
            $table->string('mensajeLunes')->nullable();
            $table->boolean('importanteLunes')->default(false);
            $table->integer('lunesTurno')->default(3);
            $table->integer('rangeSliderLunes')->default(0);

            $table->string('martes')->nullable();
            $table->string('mensajeMartes')->nullable();
            $table->boolean('importanteMartes')->default(false);
            $table->integer('martesTurno')->default(3);
            $table->integer('rangeSliderMartes')->default(0);

            $table->string('miercoles')->nullable();
            $table->string('mensajeMiercoles')->nullable();
            $table->boolean('importanteMiercoles')->default(false);
            $table->integer('miercolesTurno')->default(3);
            $table->integer('rangeSliderMiercoles')->default(0);

            $table->string('jueves')->nullable();
            $table->string('mensajeJueves')->nullable();
            $table->boolean('importanteJueves')->default(false);
            $table->integer('juevesTurno')->default(3);
            $table->integer('rangeSliderJueves')->default(0);

            $table->string('viernes')->nullable();
            $table->string('mensajeViernes')->nullable();
            $table->boolean('importanteViernes')->default(false);
            $table->integer('viernesTurno')->default(3);
            $table->integer('rangeSliderViernes')->default(0);


            $table->string('sabado')->nullable();
            $table->string('mensajeSabado')->nullable();
            $table->boolean('importanteSabado')->default(false);
            $table->integer('sabadoTurno')->default(3);;
            $table->integer('rangeSliderSabado')->default(0);

            $table->string('domingo')->nullable();
            $table->string('mensajeDomingo')->nullable();
            $table->boolean('importanteDomingo')->default(false);
            $table->integer('domingoTurno')->default(3);;
            $table->integer('rangeSliderDomingo')->default(0);


            $table->foreignId('mtipotrabajo_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpartes');
    }
};
