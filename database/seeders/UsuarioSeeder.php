<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Eliminar datos de la tabla usuario
        // User::truncate();
        $data = [
            [
                'id'=>config('constants.ID_USUARIO_ADMIN'),
                'name'=>'super.admin',
                'password'=>bcrypt('Developer'),
                'numero_documento'=>'00000000',
                'nombres'=>'SUPER AMINISTRADOR',
                'primer_apellido'=>'JOBI',
                'segundo_apellido'=>null,
                'correo_electronico'=>'super.admin@jobi.com',
                'rol_id'=>config('constants.ROL_SUPER_ADMINISTRADOR')
            ],
            [
                'id'=> (string)Str::uuid(),
                'name'=>'admin.jobi',
                'password'=>bcrypt('Developer'),
                'numero_documento'=>'00000000',
                'nombres'=>'AMINISTRADOR',
                'primer_apellido'=>'JOBI',
                'segundo_apellido'=>null,
                'correo_electronico'=>'admin@jobi.com',
                'rol_id'=>config('constants.ROL_ADMINISTRADOR')
            ],
            [
                'id'=>'c80242c1-1aad-4019-be1b-c0d3444f1f35',
                'name'=>'conductor.7039950',
                'password'=>bcrypt('Developer'),
                'numero_documento'=>'7039950',
                'nombres'=>'JUAN ROSENDO',
                'primer_apellido'=>'LLUSCO',
                'segundo_apellido'=> 'CATACORA',
                'correo_electronico'=>'jlluscos@gmail.com',
                'rol_id'=>config('constants.ROL_CONDUCTOR'),
            ],
            [
                'id'=>'0d457476-90df-4bf4-9ad1-67c4094a0d67',
                'name'=>'conductor.12394597',
                'password'=>bcrypt('Developer'),
                'numero_documento'=>'12394597',
                'nombres'=>'RONALD',
                'primer_apellido'=>'TITIRICO',
                'segundo_apellido'=> 'LOZA',
                'correo_electronico'=>'ronaldotitirico218@gmail.com',
                'rol_id'=>config('constants.ROL_CONDUCTOR'),
            ],
            [
                'id'=>'466d68d2-bdf8-4fa0-a981-a45936a3830b',
                'name'=>'cliente.jobi',
                'password'=>bcrypt('Developer'),
                'numero_documento'=>'00000002',
                'nombres'=>'CLIENTE',
                'primer_apellido'=>'JOBI',
                'segundo_apellido'=>null,
                'correo_electronico'=>'cliente@jobi.com',
                'rol_id'=>config('constants.ROL_CLIENTE'),
            ]
        ];

        $currentDateTime = Carbon::now();

        foreach ($data as &$record) {
            $record['created_at'] = $currentDateTime;
            $record['updated_at'] = $currentDateTime;
        }

        // Inserta el array data en la tabla usuario
        User::insert($data);
    }
}
