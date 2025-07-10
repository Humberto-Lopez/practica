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
    Schema::create('sucursal', function (Blueprint $table) {
        $table->id('id_sucursal');
        $table->string('nombre', 50);
        $table->unsignedBigInteger('id_direccion')->unique()->nullable();
        $table->integer('capacidad')->check('capacidad >= 0')->nullable();
        $table->timestamps();

        $table->foreign('id_direccion')->references('id_direccion')->on('direccion_sucursal')->nullOnDelete();
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
