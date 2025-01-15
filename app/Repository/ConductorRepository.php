<?php
/**
 * Created by PhpStorm.
 * User: jhon_
 * Date: 15/12/2024
 * Time: 15:43
 */

namespace App\Repository;


use App\Models\Conductor;

class ConductorRepository
{
    public function findAll($request){
        $query = Conductor::with(['usuario']);

        if (isset($request['numeroDocumento'])) {
            $query->whereHas('usuario', function($query) use ($request) {
                $query->where('numero_documento', 'like', '%' . $request['numeroDocumento'] . '%');
            });
        }

        if (isset($request['nombres'])) {
            $query->whereHas('usuario', function($query) use ($request) {
                $query->where('nombres', 'like', '%' . $request['nombres'] . '%');
            });
        }

        if (isset($request['primerApellido'])) {
            $query->whereHas('usuario', function($query) use ($request) {
                $query->where('primer_apellido', 'like', '%' . $request['primerApellido'] . '%');
            });
        }

        if(isset($request['estado'])){
            $query->where('estado','=',$request['estado']);
        }

        return $query->paginate($request['limit']??10);
    }
}