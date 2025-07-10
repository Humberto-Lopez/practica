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
        Schema::create('polizas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('total_horas');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('precio',10,2);
            $table->unsignedBigInteger('id_cliente');
            $table->text('Observaciones');
            $table->foreign('id_cliente')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polizas');
    }
};
