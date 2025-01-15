<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends \Database\Migrations\BaseMigration
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'conductor';
    }

    protected function additionalColumns(Blueprint $table)
    {
        $table->string('celular',8);
        $table->string('direccion_residencial',200)->nullable();
        $table->string('marca', 50);
        $table->string('modelo',50);
        $table->string('placa',10);
        $table->enum('color',['BLANCO','NEGRO','GRIS','ROJO','AZUL']);
        $table->string('ruta_imagen_foto',200);
        $table->string('ruta_imagen_licencia',200)->nullable();
        $table->enum('estado',['ACTIVO','INACTIVO'])->default('ACTIVO');
        //$table->string('ruta_imagen',200)->default('image/productos/product-default.png');
        $table->uuid('usuario_id');
        $table->foreign('usuario_id')->references('id')->on('users');
    }
};
