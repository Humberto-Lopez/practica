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
    Schema::create('telefono', function (Blueprint $table) {
        $table->id('id_telefono');
        $table->unsignedBigInteger('id_cliente');
        $table->string('lada', 5)->nullable();
        $table->unsignedBigInteger('numero_telefono');
        $table->string('tipo', 20);
        $table->timestamps();

        $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
        $table->check("tipo in ('casa', 'movil', 'trabajo', 'otro')");
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
