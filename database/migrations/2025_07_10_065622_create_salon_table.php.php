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
    Schema::create('salon', function (Blueprint $table) {
        $table->id('id_salon');
        $table->unsignedBigInteger('id_sucursal');
        $table->string('nombre', 50)->nullable();
        $table->integer('capacidad')->check('capacidad >= 0')->nullable();
        $table->boolean('disponibilidad')->default(true);
        $table->timestamps();

        $table->foreign('id_sucursal')->references('id_sucursal')->on('sucursal')->onDelete('cascade');
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
