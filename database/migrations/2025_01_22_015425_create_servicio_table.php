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
        Schema::create('servicio', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_tecnico');
            $table->date('fecha');
            $table->decimal('horas',18,2);
            $table->text('observaciones');
            $table->unsignedBigInteger('id_poliza');
            $table->unsignedBigInteger('id_factura');
            //foreign key
            $table->foreign('id_cliente')->references('id')->on('users');
            $table->foreign('id_tecnico')->references('id')->on('users');
            $table->foreign('id_poliza')->references('id')->on('polizas');
            $table->foreign('id_factura')->references('id')->on('facturas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio');
    }
};
