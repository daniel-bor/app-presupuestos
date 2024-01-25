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
        Schema::create('cuenta_pais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('cuenta_id');
            $table->integer('estado')->default(1); // Puede ser utilizado para activar/desactivar la relación
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pais_id')->references('id')->on('pais');
            $table->foreign('cuenta_id')->references('id')->on('cuentas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('cuenta_pais', function (Blueprint $table) {
        //     $table->dropForeign(['pais_id']);
        //     $table->dropForeign(['cuenta_id']);
        // });
        Schema::dropIfExists('cuenta_pais');
    }
};
