<?php
/**
 * Created by PhpStorm.
 * User: jhon_
 * Date: 15/12/2024
 * Time: 21:30
 */

namespace Database\Seeders;


use App\Models\Carrera;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id'=>(string)Str::uuid(),
                'usuario_solicitante_id'=>'466d68d2-bdf8-4fa0-a981-a45936a3830b',
                'conductor_id'=>'bb620706-00fb-4f64-a29e-44756b8f4388',
//                'punto_origen'=>DB::raw("ST_GeomFromText('POINT(-17.668726 -62.806713)')"),
//                'punto_destino'=>DB::raw("ST_GeomFromText('POINT(-17.6675843 -62.7926344)')"),
                'latitud_origen'=>-17.668726,
                'longitud_origen'=>-62.806713,
                'latitud_destino'=>-17.6675843,
                'longitud_destino'=>-62.7926344,
                'origen'=>'COTOCA',
                'destino'=>'PLAZA PRINCIPAL PAILAS',
                'monto_estimado'=>2.00,
                'estado'=>'RECHAZADO'
            ],
            [
                'id'=>(string)Str::uuid(),
                'usuario_solicitante_id'=>'466d68d2-bdf8-4fa0-a981-a45936a3830b',
                'conductor_id'=>'bb620706-00fb-4f64-a29e-44756b8f4388',
//                'punto_origen'=>DB::raw("ST_GeomFromText('POINT(-17.6685809 -62.7935091)')"),
//                'punto_destino'=>DB::raw("ST_GeomFromText('POINT(-17.663826 -62.768402)')"),
                'latitud_origen'=>-17.6685809,
                'longitud_origen'=>-62.7935091,
                'latitud_destino'=>-17.663826,
                'longitud_destino'=>-62.768402,
                'origen'=>'PUERTO PAILAS',
                'destino'=>'PAILON',
                'monto_estimado'=>2.00,
                'estado'=>'ACEPTADO'
            ],
        ];

        $currentDateTime = Carbon::now();

        foreach ($data as &$record) {
            $record['created_at'] = $currentDateTime;
            $record['updated_at'] = $currentDateTime;
        }

        Carrera::insert($data);
    }
}