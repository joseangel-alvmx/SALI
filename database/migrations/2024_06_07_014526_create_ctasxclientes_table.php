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
        Schema::create('ctasxclientes', function (Blueprint $table) {
            $table->integer('id');
            $table->timestamps();
            $table->id('cuenta');
            $table->string('cliente', 10);
            $table->foreign('cliente')->references('cliente')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctasxclientes');
    }
};
