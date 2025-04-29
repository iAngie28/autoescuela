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
        Schema::create('grupo_examen', function (Blueprint $table) {
            $table->id();
            $table->string('estado', 15);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('capacidad');
            $table->dateTime('fecha_hora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_examen');
    }
};
