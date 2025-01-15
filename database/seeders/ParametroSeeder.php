<?php

namespace Database\Seeders;

use App\Models\Parametro;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ParametroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas =  [
            'HONDA',
            'YAMAHA',
            'SUZUKI',
            'BAJAJ',
            'KAWASAKI',
            'HERO',
            'TVS',
            'SYM',
            'VENTO',
            'RATO',
            'LONCIN',
            'KEEWAY',
            'LIFAN',
            'ZONGSHEN',
            'MOTOMEL',
            'JIANSHE',
            'BERMUDA',
            'GIANT',
            'HAOJUE',
            'BETA'
        ];
        $data = array_map(function($marca,$index){
            return [
                'id' => (string) Str::uuid(),
                'codigo' => 'MA-' . str_pad(($index + 1), 3, '0', STR_PAD_LEFT),
                'grupo' => 'MARCA',
                'nombre' => $marca,
                'descripcion' => $marca
            ];
        },$marcas, array_keys($marcas));

        $currentDateTime = Carbon::now();

        foreach ($data as &$record) {
            $record['created_at'] = $currentDateTime;
            $record['updated_at'] = $currentDateTime;
            $record['estado']='ACTIVO';
            $record['created_by']=config('constants.ID_USUARIO_ADMIN');
        }

        Parametro::insert($data);
    }
}
