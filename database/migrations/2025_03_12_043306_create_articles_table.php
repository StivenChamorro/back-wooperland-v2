<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * esta es la migracion donde se creara la tabla de articulos
     * se creara con los campos de nombre, descripcion, precio, avatar, tipo y la llave foranea de la tienda
     * esta migracion corresponde a los articulos que se registraran en el aplicativo
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();  //es el id del articulo autoincrementable
            $table->string('name');  //es el nombre del articulo
            $table->string('description');  //es la descripcion del articulo
            $table->double('price');  //es el precio del articulo
            $table->string('avatar');  //este campo almacena la url de la imagen
            $table->string('type')->default('normal');  //es el tipo de articulo, por defecto sera normal
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');  //es la llave foranea de la tienda a la que pertenece el articulo
            $table->softDeletes();  //es la fecha de eliminacion del articulo
            $table->timestamps();  //es la fecha de creacion y actualizacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
