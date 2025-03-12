<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * esta es la migracion donde se creara la tabla de imagenes de los usuarios
     * se creara con los campos de id del canje y url de la imagen
     * esta migracion corresponde a las imagenes de cada nino que se registraran en el aplicativo
     */
    public function up(): void
    {
        Schema::create('image_users', function (Blueprint $table) {
            $table->id();  //es el id de la imagen autoincrementable
            $table->foreignId('exchange_id')->references('id')->on('exchanges')->onDelete('cascade');  //es la llave foranea del canje al que pertenece la imagen
            $table->string('url_imagen');  //url de la imagen del usuario
            $table->softDeletes();  //es la fecha de eliminacion de la imagen
            $table->timestamps();  //es la fecha de creacion y actualizacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_users');
    }
};
