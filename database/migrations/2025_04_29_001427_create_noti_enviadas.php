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
        Schema::create('noti_enviadas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_not');
            $table->unsignedBigInteger('id_user');
            $table->primary(['id_not', 'id_user']);
            $table->foreign('id_not')
            ->references('id')->on('notificaciones')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_user')
            ->references('id')->on('usuario')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noti_enviadas');
    }
};
