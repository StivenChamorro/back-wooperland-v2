<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * esta es la migracion donde se creara la tabla de respuestas
     * se creara con los campos de id, respuesta, opcion y la llave foranea de las preguntas
     * esta migracion corresponde a las respuestas de las preguntas que se registraran en el aplicativo
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();  //es el id de la respuesta autoincrementable
            $table->string('answer');  //Texto de la opción de respuesta
            $table->enum('option', ['option1', 'option2', 'option3', 'option4']);  //es la opcion de la respuesta
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');  //es la llave foranea de la pregunta a la que pertenece la respuesta
            $table->softDeletes();  //es la fecha de eliminacion de la respuesta
            $table->timestamps();  //es la fecha de creacion y actualizacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
