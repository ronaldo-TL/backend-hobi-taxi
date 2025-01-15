<?php
/**
 * Created by PhpStorm.
 * User: juan.llusco
 * Date: 4/3/2024
 * Time: 18:47
 */

namespace Database\Seeders;

use App\Models\RolMenu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RolMenuSeeders extends Seeder
{

    public function run(): void
    {
        $rolSuperAdmin = config('constants.ROL_SUPER_ADMINISTRADOR');
        $rolAdmin = config('constants.ROL_ADMINISTRADOR');
        $rolConductor = config('constants.ROL_CONDUCTOR');
        $rolCliente = config('constants.ROL_CLIENTE');

        $data = [
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolSuperAdmin,
                'menu_id'=>'1b174ed2-e559-4ea1-933d-15ca8c9b7e46',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolSuperAdmin,
                'menu_id'=>'ad24e71c-dcd8-4f63-b088-a97efcb2f0bc',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolSuperAdmin,
                'menu_id'=>'b4aa6f78-577f-42d0-ad3a-b2eaabc02539',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolSuperAdmin,
                'menu_id'=>'26dcb6ff-a0bb-444a-bccd-2e16037fa8c5',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolSuperAdmin,
                'menu_id'=>'69811f8e-9296-4b89-a0da-b40d5f01b493',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
           
            

            // ADMINISTRADOR
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolAdmin,
                'menu_id'=>'1b174ed2-e559-4ea1-933d-15ca8c9b7e46',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolAdmin,
                'menu_id'=>'413a061c-f3b4-41ae-85b7-8c44a97a66a9',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolAdmin,
                'menu_id'=>'8ec6a708-02c3-4cbb-bfd4-1b678adc2dcf',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolAdmin,
                'menu_id'=>'6880ce88-f120-40cd-8c32-16055a46f8a7',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            
            // CONDUCTOR
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolConductor,
                'menu_id'=>'1b174ed2-e559-4ea1-933d-15ca8c9b7e46',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolConductor,
                'menu_id'=>'bdf2ab31-bd14-47a9-843e-575fe4ca0cd5',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],

            // CLIENTE
            [
                'id'=> (string)Str::uuid(),
                'rol_id'=>$rolCliente,
                'menu_id'=>'1b174ed2-e559-4ea1-933d-15ca8c9b7e46',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
        ];

        $currentDateTime = Carbon::now();

        foreach ($data as &$record) {
            $record['created_at'] = $currentDateTime;
            $record['updated_at'] = $currentDateTime;
        }

        RolMenu::insert($data);
    }

}