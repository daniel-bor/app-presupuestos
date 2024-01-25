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
        Schema::create('presupuesto_primarios', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedBigInteger('filial_id'); // Asegúrate de que la tabla 'filiales' exista
            $table->decimal('total', 10, 2); // Ejemplo de campo para el total con dos decimales
            $table->boolean('estado'); // Puede ser utilizado para activar/desactivar un presupuesto
            $table->timestamps(); // Crea automáticamente las columnas 'created_at' y 'updated_at'

            $table->foreign('filial_id')->references('id')->on('filials');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('presupuestos_primario', function (Blueprint $table) {
        //     $table->dropForeign(['filial_id']);
        // });
        Schema::dropIfExists('presupuesto_primarios');
    }
};
