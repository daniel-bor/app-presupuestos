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
        Schema::create('filials', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('direccion');
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->unsignedBigInteger('pais_id'); // Asegúrate de que la tabla 'paises' exista
            $table->integer('estado')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pais_id')->references('id')->on('pais');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('filiales', function (Blueprint $table) {
        //     $table->dropForeign(['pais_id']);
        // });
        Schema::dropIfExists('filials');
    }
};
