<?php

namespace Database\Seeders;

use App\Models\Rol;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Rol::truncate();

        $data = [
            [
                'id'=>'450f3f9a-d10a-475f-8828-82d0057652c3',
                'codigo'=>'ROL-000',
                'nombre'=>'SUPER ADMINISTRADOR',
                'descripcion'=>'Rol para el super administrador',
                'estado'=>'ACTIVO',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=>'7a16f88b-10bb-4a07-9bc2-3458124af968',
                'codigo'=>'ROL-001',
                'nombre'=>'ADMINISTRADOR',
                'descripcion'=>'Rol para administrar conductores y ver reportes de carreras',
                'estado'=>'ACTIVO',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=>'3d12cb09-91f2-43aa-be60-bbf322116a07',
                'codigo'=>'ROL-002',
                'nombre'=>'CONDUCTOR',
                'descripcion'=>'Rol para el personal conductor',
                'estado'=>'ACTIVO',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=>'70796247-01c3-469f-9fae-cd6082ebad86',
                'codigo'=>'ROL-003',
                'nombre'=>'CLIENTE',
                'descripcion'=>'Rol para el cliente',
                'estado'=>'ACTIVO',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ]
        ];

        $currentDateTime = Carbon::now();

        foreach ($data as &$record) {
            $record['created_at'] = $currentDateTime;
            $record['updated_at'] = $currentDateTime;
        }

        Rol::insert($data);
    }
}
