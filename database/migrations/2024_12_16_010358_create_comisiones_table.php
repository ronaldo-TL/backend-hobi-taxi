<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends \Database\Migrations\BaseMigration
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'comision';
    }

    protected function additionalColumns(Blueprint $table)
    {
        $table->uuid('conductor_id');
        $table->date('fecha_inicio');
        $table->date('fecha_fin');
        $table->decimal('monto', 10, 2)->default(2.00);
        // $table->enum('estado', ['NUEVO','PENDIENTE', 'ACEPTADO', 'RECHAZADO', 'COMPLETADO'])->default('NUEVO');
        $table->foreign('conductor_id')->references('id')->on('conductor');
    }
};
