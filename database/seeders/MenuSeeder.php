<?php

namespace Database\Seeders;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id'=>'1b174ed2-e559-4ea1-933d-15ca8c9b7e46',
                'nombre'=>'Dashboard',
                'ruta'=>'dashboard',
                'icono'=>'dashboard',
                'orden'=>1
            ],
            [
                'id'=>'ad24e71c-dcd8-4f63-b088-a97efcb2f0bc',
                'nombre'=>'Roles',
                'ruta'=>'roles',
                'icono'=>'shield',
                'orden'=>2
            ],
            [
                'id'=>'b4aa6f78-577f-42d0-ad3a-b2eaabc02539',
                'nombre'=>'Menus',
                'ruta'=>'menus',
                'icono'=>'menu',
                'orden'=>3
            ],
            [
                'id'=>'26dcb6ff-a0bb-444a-bccd-2e16037fa8c5',
                'nombre'=>'Usuarios',
                'ruta'=>'usuarios',
                'icono'=>'people',
                'orden'=>4
            ],
            [
                'id'=>'69811f8e-9296-4b89-a0da-b40d5f01b493',
                'nombre'=>'Parametros',
                'ruta'=>'parametros',
                'icono'=>'settings',
                'orden'=>5
            ],
            [
                'id'=>'413a061c-f3b4-41ae-85b7-8c44a97a66a9',
                'nombre'=>'Conductores',
                'ruta'=>'conductores',
                'icono'=>'sports_motorsports',
                'orden'=>6
            ],
            [
                'id'=>'8ec6a708-02c3-4cbb-bfd4-1b678adc2dcf',
                'nombre'=>'Carreras',
                'ruta'=>'carreras',
                'icono'=>'flag_circle',
                'orden'=>7
            ],
            [
                'id'=>'6880ce88-f120-40cd-8c32-16055a46f8a7',
                'nombre'=>'Comisiones',
                'ruta'=>'comisiones',
                'icono'=>'payments',
                'orden'=>8
            ],
            [
                'id'=>'bdf2ab31-bd14-47a9-843e-575fe4ca0cd5',
                'nombre'=>'Bandeja',
                'ruta'=>'bandeja',
                'icono'=>'book_online',
                'orden'=>9
            ],
            [
                'id'=>'07b31148-47e1-4361-a29d-8d7f444b12ff',
                'nombre'=>'Solicitudes',
                'ruta'=>'solicitudes',
                'icono'=>'book_online',
                'orden'=>10
            ],
        ];

        $currentDateTime = Carbon::now();

        foreach ($data as &$record) {
            $record['created_at'] = $currentDateTime;
            $record['updated_at'] = $currentDateTime;
            $record['estado']='ACTIVO';
            $record['created_by']=config('constants.ID_USUARIO_ADMIN');
        }

        Menu::insert($data);
    }
}
