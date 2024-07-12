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
        Schema::create('lineas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('referencia_unica',17)->index();
            $table->date('fecha_movimiento');
            $table->string('banco',5);
            $table->foreign('banco')->references('banco')->on('bancos');
            $table->bigInteger('cuenta');
            $table->integer('folio_banco');
            $table->integer('folio_aceptacion');
            $table->string('transaccion',30);
            $table->string('referencia',30);
            $table->decimal('importe',20,2);
            $table->string('tipo_operacion',3);
            $table->string('cliente',10)->nullable();
            $table->foreign('cliente')->references('cliente')->on('clientes');
            $table->string('agente_asignado',100)->nullable();
            $table->string('vendedor',5)->nullable();
            $table->string('estado',3)->default('new');
            $table->foreign('estado')->references('estado')->on('estados');
            $table->date('fecha_estado');
            $table->string('cobro',10)->nullable();
            $table->date('fecha_cobro')->nullable();
            $table->string('num_deposito',10)->nullable();
            $table->boolean('href')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineas');
    }
};
