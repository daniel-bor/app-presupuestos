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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string('concepto');
            $table->text('descripcion')->nullable();
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2); // Podría ser calculado como cantidad * precio_unitario
            $table->unsignedBigInteger('cuenta_id');
            $table->unsignedBigInteger('presupuesto_secundario_id');
            $table->boolean('estado');
            $table->timestamps();

            $table->foreign('presupuesto_secundario_id')->references('id')->on('presupuesto_secundarios');
            $table->foreign('cuenta_id')->references('id')->on('cuentas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('gastos', function (Blueprint $table) {
        //     $table->dropForeign(['cuenta_id']);
        //     $table->dropForeign(['presupuesto_secundario_id']);
        // });
        Schema::dropIfExists('gastos');
    }
};
