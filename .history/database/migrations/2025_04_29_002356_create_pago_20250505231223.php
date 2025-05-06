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
        Schema::create('pago', function (Blueprint $table) {
            $table->id();
            $table->integer('monto');
            $table->date('fecha')->default(now()->toDateString());
            $table->integer('descuento')->default(0);
            $table->unsignedBigInteger('id_est');
            $table->unsignedBigInteger('id_adm');
            $table->timestamps();
            $table->foreign('id_est')
            ->references('id')
            ->on('usuario')
            ->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('pago');
    }
};
