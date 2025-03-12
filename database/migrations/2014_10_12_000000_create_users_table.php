<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * esta es la migracion donde se creara la tabla de usuarios
     * se creara con los campos de nombre, apellido, foto de perfil, fecha de nacimiento, correo, usuario, contraseña, rol, fecha de verificacion de correo, token de recordar y fechas de creacion y actualizacion
     * esta migracion corresponde a los usuartios del aplicativo, quienes seras los responsables de los ninos 
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();  //es el id del usuario autoincrementable
            $table->string('name'); //es el nombre del usuario
            $table->string('lastname'); //es el apellido del usuario
            $table->string('pic_profile')->nullable(); //es la foto de perfil del usuario
            $table->date('birthdate');  //es la fecha de nacimiento del usuario
            $table->string('email')->unique();  //es el correo del usuario
            $table->string('user')->unique();  //es el usuario del usuario
            $table->string('password');  //es la contraseña del usuario
            $table->string('role')->default('user');  //es el rol del usuario, por defecto sera user
            $table->timestamp('email_verified_at')->nullable();  //es la fecha de verificacion de correo
            $table->rememberToken();  //es el token de recordar
            $table->softDeletes();  //es la fecha de eliminacion del articulo
            $table->timestamps();  //es la fecha de creacion y actualizacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
