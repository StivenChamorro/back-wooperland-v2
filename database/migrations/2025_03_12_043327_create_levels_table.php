<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * esta es la migracion donde se creara la tabla de niveles
     * se creara con los campos de nombre, puntaje y la llave foranea de los temas
     * esta migracion corresponde a los niveles que se registraran en el aplicativo
     */
    public function up(): void
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();  //es el id del nivel autoincrementable
            $table->string('name');  //es el nombre del nivel
            $table->integer('score');  //es el puntaje del nivel
            $table->foreignId('topic_id')->references('id')->on('topics')->onDelete('cascade');  //es la llave foranea del tema al que pertenece el nivel
            $table->softDeletes();  //es la fecha de eliminacion del articulo
            $table->timestamps();  //es la fecha de creacion y actualizacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
