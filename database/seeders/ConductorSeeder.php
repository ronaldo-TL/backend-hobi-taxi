<?php
/**
 * Created by PhpStorm.
 * User: jhon_
 * Date: 15/12/2024
 * Time: 15:21
 */

namespace Database\Seeders;


use App\Models\Conductor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ConductorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Rol::truncate();

        $data = [
            [
                'id'=>'bb620706-00fb-4f64-a29e-44756b8f4388',
                'usuario_id'=>'c80242c1-1aad-4019-be1b-c0d3444f1f35',
                'celular'=>'75880746',
                'direccion_residencial'=>'CALE ABC NRO.123',
                'marca'=>'HONDA',
                'modelo'=>'Honda XR 150',
                'color'=>'NEGRO',
                'placa'=>'1234ABC',
                'ruta_imagen_foto'=>'conductores/foto_default.jpg',
                'ruta_imagen_licencia'=>'conductores/licencia_default.png',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
            [
                'id'=>'1b3448e7-a105-43dc-8733-53b27fbc9e94',
                'usuario_id'=>'0d457476-90df-4bf4-9ad1-67c4094a0d67',
                'celular'=>'71264690',
                'direccion_residencial'=>'CALE ABC NRO.123',
                'marca'=>'HONDA',
                'modelo'=>'Honda XR 150',
                'color'=>'NEGRO',
                'placa'=>'4234ABC',
                'ruta_imagen_foto'=>'conductores/foto_default.jpg',
                'ruta_imagen_licencia'=>'conductores/licencia_default.png',
                'created_by'=>config('constants.ID_USUARIO_ADMIN')
            ],
        ];

        $currentDateTime = Carbon::now();

        foreach ($data as &$record) {
            $record['created_at'] = $currentDateTime;
            $record['updated_at'] = $currentDateTime;
        }

        Conductor::insert($data);
    }

}