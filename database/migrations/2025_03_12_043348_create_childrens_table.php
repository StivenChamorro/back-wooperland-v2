<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * esta es la migracion donde se creara la tabla de hijos
     * se creara con los campos de nombre, apellido, fecha de nacimiento, apodo, relacion, avatar, genero, diamantes, llave foranea de usuario y sobre mi
     * esta migracion corresponde a los hijos que se registraran en el aplicativo
     */
    public function up(): void
    {
        Schema::create('childrens', function (Blueprint $table) {
            $table->id();  //es el id del nino autoincrementable
            $table->string('name');  //es el nombre del nino
            $table->string('lastname');  //es el apellido del nino
            $table->date('birthdate');  //es la fecha de nacimiento del nino
            $table->string('nickname');  //es el apodo del nino
            $table->string('relation');  //es la relacion del nino
            $table->string('avatar')->nullable();  //este campo alamcena la url de la imagen
            $table->string('gender');  //es el genero del nino
            $table->integer('diamonds')->default(0);  //es la cantidad de diamantes del nino, por defecto sera 0
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');  //es la llave foranea del usuario al que pertenece el nino
            $table->text('about')->nullable();  //es sobre mi del nino
            $table->softDeletes();  //es la fecha de eliminacion del nino
            $table->timestamps();  //es la fecha de creacion y actualizacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('childrens');
    }
};
