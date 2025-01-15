<?php

use Database\Migrations\BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends BaseMigration
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'permiso';
        $this->softDeletes = false;
    }

    protected function additionalColumns(Blueprint $table)
    {
        $table->string('nombre',100);
        $table->text('descripcion');
        $table->enum('estado',['ACTIVO','INACTIVO'])->default('ACTIVO');
    }
};