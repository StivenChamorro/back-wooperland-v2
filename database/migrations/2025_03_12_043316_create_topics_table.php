<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * esta es la migracion donde se creara la tabla de temas
     * se creara con los campos de nombre, imagen, descripcion
     * esta migracion corresponde a los temas que se registraran en el aplicativo
     */
    public function up(): void
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();  //es el id del tema autoincrementable
            $table->string('name');  //es el nombre del tema
            $table->string('image');  //url de la imagen del usuario
            $table->text('description');  //es la descripcion del tema
            $table->softDeletes();  //es la fecha de eliminacion del articulo
            $table->timestamps();  //es la fecha de creacion y actualizacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
