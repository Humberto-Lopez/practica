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
    Schema::create('mesas_sucursal', function (Blueprint $table) {
        $table->id('id_mesa');
        $table->unsignedBigInteger('id_salon');
        $table->integer('num_mesa')->nullable();
        $table->integer('capacidad')->check('capacidad >= 0')->nullable();
        $table->string('ubicacion', 30)->nullable();
        $table->timestamps();

        $table->foreign('id_salon')->references('id_salon')->on('salon')->onDelete('cascade');
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
