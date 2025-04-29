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
        Schema::create('administrador', function (Blueprint $table) {
            $table->unsignedBigInteger('id_adm')->primary();
            $table->string('turno', 10);
    
            $table->foreign('id_adm')
            ->references('id')
            ->on('usuario')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrador');
    }
};
