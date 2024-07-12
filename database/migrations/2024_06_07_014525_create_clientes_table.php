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
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('cliente',10)->primary();
            $table->timestamps();
            $table->string('nombre_cliente',100)->nullable();
            $table->string('agente',100);
            $table->foreign('agente')->references('usuario')->on('users');
            $table->string('ref_bbva',11);
            $table->string('ref_bnx',11);
            $table->string('ref_otr',11);
            $table->string('vendedor',5);
            $table->string('nombre_vendedor',100);
            $table->string('gerente',100);
            $table->string('cedis',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
