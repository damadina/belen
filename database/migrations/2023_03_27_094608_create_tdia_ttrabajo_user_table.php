<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tdia_ttrabajo_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tdia_id');
            $table->unsignedBigInteger('ttrabajo_id');
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->foreign('tdia_id')->references('id')->on('tdias')->onDelete('cascade');
            $table->foreign('ttrabajo_id')->references('id')->on('ttrabajos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tdia_ttrabajo_user');
    }
};
