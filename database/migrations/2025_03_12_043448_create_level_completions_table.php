<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * esta es la migracion donde se creara la tabla de completado de niveles
     * se creara con los campos de id del niño, id del nivel y el estado de completado
     * esta migracion corresponde a los niveles que se han completado en el aplicativo
     */
    public function up(): void
    {
        Schema::create('level_completions', function (Blueprint $table) {
            $table->id();  //es el id del nivel completado autoincrementable
            $table->foreignId('children_id')->references('id')->on('childrens')->onDelete('cascade');  //es la llave foranea del niño que completo el nivel
            $table->foreignId('level_id')->references('id')->on('levels')->onDelete('cascade');  //es la llave foranea del nivel completado
            $table->enum('status', ['completed', 'not_completed'])->default('not_completed');  //es el estado de completado del nivel
            $table->softDeletes();  //es la fecha de eliminacion del articulo
            $table->timestamps();  //es la fecha de creacion y actualizacion
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_completions');
    }
};
