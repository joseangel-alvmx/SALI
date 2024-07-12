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
        Schema::create('transac_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('usuario',100);
            $table->foreign('usuario')->references('usuario')->on('users');
            $table->date('fecha_registro');
            $table->string('descripcion',150);
            $table->string('operacion',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transac_logs');
    }
};
