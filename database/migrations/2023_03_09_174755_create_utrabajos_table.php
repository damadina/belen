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
        Schema::create('utrabajos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('descripcion')->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('importante')->default(false);
            $table->integer('tiempoestimado')->nullable();
            $table->integer('orden')->default(99);
            $table->foreignId('jornada_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utrabajos');
    }
};
