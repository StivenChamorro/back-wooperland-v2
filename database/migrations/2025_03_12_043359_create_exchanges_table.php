<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * esta es la migracion donde se creara la tabla de canjes
     * se creara con los campos de descripcion, id del niño y id del articulo   
     * esta migracion corresponde a los canjes que se registraran en el aplicativo
     */
    public function up(): void
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id(); //es el id del canje autoincrementable
            $table->string('description')->default('canje exitoso')->nullable();  //es la descripcion del canje
            $table->foreignId('children_id')->references('id')->on('childrens')->onDelete('cascade');  //es la llave foranea del niño que realiza el canje
            $table->foreignId('article_id')->references('id')->on('articles')->onDelete('cascade');  //es la llave foranea del articulo que se canjea
            $table->softDeletes();  //es la fecha de eliminacion del articulo
            $table->timestamps();  //es la fecha de creacion y actualizacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchanges');
    }
};
