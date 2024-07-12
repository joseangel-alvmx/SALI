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
        Schema::create('bancosraws', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('banco',5);
            $table->bigInteger('cuenta');
            $table->date('fecha_valor');
            $table->integer('folio_banco');
            $table->string('transaccion',30);
            $table->integer('cargo_abono')->default(0);
            $table->decimal('importe',20,2);
            $table->string('moneda',3);
            $table->integer('folio_aceptacion');
            $table->string('referencia',30);
            $table->string('tipo_movimiento',3);
            $table->date('fecha_carga');
            $table->boolean('estatus')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bancosraws');
    }
};
