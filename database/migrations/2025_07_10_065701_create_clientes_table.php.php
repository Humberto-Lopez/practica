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
        $table->id('id_cliente');
        $table->string('nombre_cliente', 50);
        $table->string('ap_paterno_cliente', 50)->nullable();
        $table->string('ap_materno_cliente', 50)->nullable();
        $table->string('email', 30)->unique()->nullable();
        $table->timestamps();
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
