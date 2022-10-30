<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            
            $table->id();
            $table->string('text');
            $table->date('vigenciadate')->nullable();
            $table->float('import');
            $table->date('acceptada')->nullable();
            $table->date('rechazada')->nullable();
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('anuncio_id');
            
            $table->foreign('anuncio_id')->references('id')->on('anuncios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofertas');
    }
}
