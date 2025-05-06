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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->integer('CI')->unique();
            $table->string('user', length: 100)->unique();;
            $table->string('NombreCompleto', length: 75);
            $table->string('password', length: 100);
            $table->enum('sexo', ['masculino', 'femenino', 'otro'])->default('otro');
            $table->integer('telefono');
            $table->string('direccion', length: 25);
            $table->date('fch_reg')->default(now()->toDateString());
            $table->foreignId('id_rol')->constrained('rol', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
