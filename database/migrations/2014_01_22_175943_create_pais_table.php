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
        Schema::create('pais', function (Blueprint $table) {
            $table->id(); // Crea una columna de ID autoincremental
            $table->string('nombre');
            $table->text('descripcion')->nullable(); // 'nullable' significa que el campo puede ser NULL
            $table->integer('estado')->default(1); // Puede ser utilizado para activar/desactivar un país
            $table->timestamps(); // Crea automáticamente las columnas 'created_at' y 'updated_at'
            $table->softDeletes(); // Crea automáticamente la columna 'deleted_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pais');
    }
};
