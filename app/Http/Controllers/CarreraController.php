<?php
/**
 * Created by PhpStorm.
 * User: jhon_
 * Date: 15/12/2024
 * Time: 21:55
 */

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Resources\CarreraCollection;
use App\Repository\CarreraRepository;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    private  $carreraRepository;

    public function __construct(CarreraRepository $carreraRepository)
    {
        $this->carreraRepository = $carreraRepository;
    }

    public function index(Request $request){
        try {
            $params = $request->query->all();
            $carreras = $this->carreraRepository->findAll($params);
            return ApiResponse::success( new CarreraCollection($carreras));
        } catch (\Exception $e) {
            return ApiResponse::exception($e);
        }
    }
}