<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cliente', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->bigIncrements('id');
            $table->string('nombre', 50);
            $table->string('apellidos', 50);
            $table->date('fechaNac');
            $table->string('correo', 120)->unique();
            $table->string('clave', 10);
            $table->string('telefono', 9, 9)->nullable();
            $table->string('direccion')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->string('estadoCivil')->nullable();
            $table->decimal('sueldoAnual', 10, 3)->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['nombre', 'apellidos', 'fechaNac']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
