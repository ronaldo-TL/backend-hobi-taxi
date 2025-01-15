<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends \Database\Migrations\BaseMigration
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'carrera';
    }

    protected function additionalColumns(Blueprint $table)
    {
        $table->uuid('usuario_solicitante_id');
        $table->uuid('conductor_id');
//        $table->geometry('punto_origen');
        $table->decimal('latitud_origen', 10, 8);
        $table->decimal('longitud_origen', 10, 8);
//        $table->geometry('punto_destino');
        $table->decimal('latitud_destino', 10, 8);
        $table->decimal('longitud_destino', 10, 8);
        $table->string('origen', 255);
        $table->string('destino', 255);
        $table->decimal('monto_estimado', 10, 2)->default(2.00);
        $table->enum('estado', ['NUEVO','PENDIENTE', 'ACEPTADO', 'RECHAZADO', 'COMPLETADO'])->default('NUEVO');
        $table->foreign('usuario_solicitante_id')->references('id')->on('users');
        $table->foreign('conductor_id')->references('id')->on('conductor');
    }
};
