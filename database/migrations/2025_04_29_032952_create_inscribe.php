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
        Schema::create('inscribe', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_Insc');
            $table->char('categoria_actual')->nullable();
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_pago');
            $table->unsignedBigInteger('id_paquete');
            
            $table->foreign('id_categoria')
            ->references('id')->on('examen_categoria_aspira')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('id_pago')
            ->references('id')->on('pago')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('id_paquete')
            ->references('id')->on('paquete')
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
        Schema::dropIfExists('inscribe');
    }
};
