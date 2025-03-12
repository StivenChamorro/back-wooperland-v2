<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * esta es la migracion donde se creara la tabla de preguntas
     * se creara con los campos de pregunta, puntaje, respuesta correcta, pista y la llave foranea de los niveles
     * esta migracion corresponde a las preguntas que se registraran en el aplicativo
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();  //es el id de la pregunta autoincrementable
            $table->string('question');  //es la pregunta
            $table->integer('score');  //es el puntaje de la pregunta
            $table->string('correct_answer');  //es la respuesta correcta
            $table->string('clue'); // agregamos como nuevo campo, clue(pista) 
            $table->foreignId('level_id')->references('id')->on('levels')->onDelete('cascade');  //es la llave foranea del nivel al que pertenece la pregunta
            $table->softDeletes();  //es la fecha de eliminacion de la pregunta
            $table->timestamps();  //es la fecha de creacion y actualizacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
