<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreConductorRequest;
use App\Http\Resources\ConductorCollection;
use App\Http\Resources\ConductorResource;
use App\Models\Conductor;
use App\Models\User;
use App\Repository\ConductorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConductorController extends Controller
{
    private  $conductorRepository;

    public function __construct(ConductorRepository $conductorRepository)
    {
        $this->conductorRepository = $conductorRepository;
    }

    public function index(Request $request){
        try {
            $params = $request->query->all();
            $conductores = $this->conductorRepository->findAll($params);
            return ApiResponse::success( new ConductorCollection($conductores));
        } catch (\Exception $e) {
            return ApiResponse::exception($e);
        }
    }

    public function store(StoreConductorRequest $request){
        try {
            $datos = $request->validated();
            $datos["password"] = bcrypt($datos["password"]);
            $usuario = User::firstOrCreate(
                ['name' => $datos['name']],
                $datos
            );
            $datos['usuario_id'] = $usuario->id;
            $folder='conductores';
            $imagen = $request->files->get('fotoUrl');
            $datos['ruta_imagen_foto']= "$folder/foto_default.jpg";
            if($imagen){
                $fileName = 'foto_'.(string)Str::uuid().'.'.$imagen->getClientOriginalExtension();
                $imagen->move($folder,$fileName);
                $datos['ruta_imagen_foto']= "$folder/$fileName";
            }
            $licencia = $request->files->get('licenciaUrl');
            //$datos['ruta_imagen_licencia']= "$folder/licencia_default.png";
            if($licencia){
                $fileName = 'licencia_'.(string)Str::uuid().'.'.$licencia->getClientOriginalExtension();
                $licencia->move($folder,$fileName);
                $datos['ruta_imagen_licencia']= "$folder/$fileName";
            }
            $conductor = new ConductorResource(Conductor::create($datos));
            return ApiResponse::success($conductor);
        } catch (\Exception $e) {
            return ApiResponse::exception($e);
        }
    }

    public function show(Conductor $conductor)
    {
        try {
            $conductor->usuario;
            return ApiResponse::success(new ConductorResource($conductor));
        } catch (\Exception $e) {
            return ApiResponse::exception($e);
        }
    }

    public function update(Conductor $conductor, UpdateUsuarioRequest $request){
        try {
            $datos = $request->all();
            unset($datos['password']);
            $conductor->update($datos);
            return ApiResponse::success(new ConductorResource($conductor));
        } catch (\Exception $e) {
            return ApiResponse::exception($e);
        }
    }

    public function updateEstado(Conductor $conductor, Request $request){
        try {
            $estado = $request->request->get('estado');
            if(!$estado){
                throw new \Exception('Estado es requerido',400);
            }
            $conductor->update(['estado'=>$estado]);
            return ApiResponse::success(new ConductorResource($conductor));
        } catch (\Exception $e) {
            return ApiResponse::exception($e);
        }
    }

    public function updateImagenFoto(Conductor $conductor, Request $request){
        try {
            $imagen = $request->files->get('fotoUrl');
            if(!$imagen){
                throw new \Exception('Debes enviar la imagen',400);
            }
            $folder='conductores';
            $fileName = 'foto_'.(string)Str::uuid().'.'.$imagen->getClientOriginalExtension();
            $imagen->move($folder,$fileName);
            $datos['ruta_imagen_foto']= "$folder/$fileName";
            $conductor->update($datos);
            return ApiResponse::success(new ConductorResource($conductor));
        } catch (\Exception $e) {
            return ApiResponse::exception($e);
        }
    }

    public function updateImagenLicencia(Conductor $conductor, Request $request){
        try {
            $imagen = $request->files->get('licenciaUrl');
            if(!$imagen){
                throw new \Exception('Debes enviar la licencia',400);
            }
            $folder='conductores';
            $fileName = 'licencia_'.(string)Str::uuid().'.'.$imagen->getClientOriginalExtension();
            $imagen->move($folder,$fileName);
            $datos['ruta_imagen_licencia']= "$folder/$fileName";
            $conductor->update($datos);
            return ApiResponse::success(new ConductorResource($conductor));
        } catch (\Exception $e) {
            return ApiResponse::exception($e);
        }
    }
}
