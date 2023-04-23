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
        Schema::create('mtareas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('indicaciones')->nullable();
            $table->boolean('importante')->default(false);
            $table->text('mensaje')->nullable();
            $table->integer('tiempoEstimado')->nullable();
            $table->foreignId('mtipotrabajo_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mtareas');
    }
};
