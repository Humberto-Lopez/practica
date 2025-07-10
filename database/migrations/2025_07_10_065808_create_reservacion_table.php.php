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
    Schema::create('reservacion', function (Blueprint $table) {
        $table->id('id_reservacion');
        $table->unsignedBigInteger('id_cliente');
        $table->unsignedBigInteger('id_salon');
        $table->unsignedBigInteger('id_sucursal');
        $table->unsignedBigInteger('id_tipo_reservacion');
        $table->date('fecha_reserva');
        $table->time('hora_inicio');
        $table->time('hora_fin');
        $table->integer('cantidad_personas')->check('cantidad_personas > 0');
        $table->string('estado', 30)->nullable();
        $table->string('observaciones', 100)->nullable();
        $table->timestamps();

        $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
        $table->foreign('id_salon')->references('id_salon')->on('salon')->onDelete('cascade');
        $table->foreign('id_sucursal')->references('id_sucursal')->on('sucursal')->onDelete('cascade');
        $table->foreign('id_tipo_reservacion')->references('id_tipo_reservacion')->on('tipo_reservacion')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
