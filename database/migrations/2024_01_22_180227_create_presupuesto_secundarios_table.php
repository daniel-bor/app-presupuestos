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
        Schema::create('presupuesto_secundarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('total', 10, 2); // Ejemplo de campo para el total con dos decimales
            $table->unsignedBigInteger('presupuesto_primario_id');
            $table->boolean('autorizado')->default(false); // Ejemplo de campo booleano (true/false)
            $table->integer('estado')->default(1); // Puede ser utilizado para activar/desactivar un presupuesto
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('presupuesto_primario_id')->references('id')->on('presupuesto_primarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('presupuesto_secundario', function (Blueprint $table) {
        //     $table->dropForeign(['presupuesto_primario_id']);
        // });
        
        Schema::dropIfExists('presupuesto_secundarios');
    }
};
