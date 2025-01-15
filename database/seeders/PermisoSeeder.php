<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Permiso::truncate();
         $data = [
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c40','nombre'=>'usuarios:listar','descripcion'=>'Permiso para listar los usuarios'], 
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c41','nombre'=>'usuarios:crear','descripcion'=>'Permiso para crear usuarios'],
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c42','nombre'=>'usuarios:actualizar','descripcion'=>'Permiso para actualizar usuario'],
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c43','nombre'=>'usuarios:restaurar:contrasena','descripcion'=>'Permiso para reestablecer la contraseña del usuarios'],
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c44','nombre'=>'roles:crear','descripcion'=>'Permiso para crear el rol'],
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c45','nombre'=>'roles:listar','descripcion'=>'Permiso para listar los roles'],
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c46','nombre'=>'roles:actualizar','descripcion'=>'Permiso para actualizar el rol'],
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c47','nombre'=>'paramteros:crear','descripcion'=>'Permiso para crear el parametro'],
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c48','nombre'=>'paramteros:listar','descripcion'=>'Permiso para listar los parametros'],
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c49','nombre'=>'paramteros:actualizar','descripcion'=>'Permiso para actualizar parametro'],
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c50','nombre'=>'menus:crear','descripcion'=>'Permiso para crear menu'],
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c51','nombre'=>'menus:listar','descripcion'=>'Permiso para listar los menus'],
             ['id'=>'ff077dcb-a058-45c1-8d17-903c4d701c52','nombre'=>'menus:actualizar','descripcion'=>'Permiso para actualzar menus']
         ];

        $currentDateTime = Carbon::now();

        foreach ($data as &$record) {
            $record['created_by'] = config('constants.ID_USUARIO_ADMIN');
            $record['created_at'] = $currentDateTime;
            $record['updated_at'] = $currentDateTime;
        }

        Permiso::insert($data);
    }
}
