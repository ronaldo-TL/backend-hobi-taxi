<?php
/**
 * Created by PhpStorm.
 * User: jhon_
 * Date: 15/12/2024
 * Time: 15:43
 */

namespace App\Repository;


use App\Models\Carrera;
use Carbon\Carbon;

class CarreraRepository
{
    public function findAll($request){
        $query = Carrera::with(['solicitante','conductor.usuario']);

        if (isset($request['nombres'])) {
            $query->whereHas('solicitante', function($query) use ($request) {
                $query->where('nombres', 'like', '%' . $request['nombres'] . '%');
            });
        }

        if(isset($request['fechaInicio']) or isset($request['fechaFin'])){
            $fechaInicio = isset($request['fechaInicio']) ? Carbon::parse($request['fechaInicio']) : Carbon::now();
            $fechaFin = isset($request['fechaFin']) ? Carbon::parse($request['fechaFin']) : Carbon::now();
            $query->whereBetween('created_at', [$fechaInicio->startOfDay(), $fechaFin->endOfDay()]);
        }

        if(isset($request['estado'])){
            $query->where('estado','=',$request['estado']);
        }

        return $query->paginate($request['limit']??10);
    }
}