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
    Schema::create('tipo_reservacion', function (Blueprint $table) {
        $table->id('id_tipo_reservacion');
        $table->string('nombre_reservacion', 50);
        $table->string('concepto', 50)->nullable();
        $table->integer('precio')->check('precio >= 0')->nullable();
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
