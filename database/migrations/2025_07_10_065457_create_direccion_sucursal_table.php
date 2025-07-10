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
    Schema::create('direccion_sucursal', function (Blueprint $table) {
        $table->id('id_direccion'); // SERIAL equivalente
        $table->integer('numero_local')->nullable();
        $table->integer('codigo_postal')->nullable();
        $table->string('calle', 60)->nullable();
        $table->string('municipio', 60)->nullable();
        $table->string('estado', 60)->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direccion_sucursal');
    }
};
