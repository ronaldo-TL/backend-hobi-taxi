<?php
/**
 * Created by PhpStorm.
 * User: desarrollador
 * Date: 16/12/24
 * Time: 14:14
 */

namespace App\Repository;


use App\Models\Comision;

class ComisionRepository
{
    public function findAll($request){
        $query = Comision::with(['conductor.usuario']);
                
        if(isset($request['estado'])){
            $query->where('estado','=',$request['estado']);
        }

        return $query->paginate($request['limit']??10);
    }
}