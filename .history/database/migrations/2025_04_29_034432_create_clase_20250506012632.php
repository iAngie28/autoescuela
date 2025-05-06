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
        Schema::create('clase', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('estado', 15);
            $table->string('comentario_Inst', 250)->nullable();
            $table->string('reporte_estudiante', 100)->nullable();
            $table->unsignedBigInteger('id_paquete');
            $table->unsignedBigInteger('id_vehiculo');
            $table->unsignedBigInteger('id_inst');

            $table->foreign('id_paquete')
            ->references('id')->on('paquete')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('id_vehiculo')
            ->references('id')->on('vehiculo')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('id_inst')
            ->references('id')->on('instructor')
            ->onUpdate('cascade')
            ->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clase');
    }
};
