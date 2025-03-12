<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * esta es la migracion donde se creara la tabla de tiendas
     * se creara con los campos de nombre y descripcion
     * esta migracion corresponde a las tiendas que se registraran en el aplicativo
     */
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();  //es el id de la tienda autoincrementable
            $table->string('name');  //es el nombre de la tienda
            $table->string('description');  //es la descripcion de la tienda
            $table->softDeletes();  //es la fecha de eliminacion del articulo
            $table->timestamps();  //es la fecha de creacion y actualizacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
