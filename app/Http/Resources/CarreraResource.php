<?php
/**
 * Created by PhpStorm.
 * User: jhon_
 * Date: 15/12/2024
 * Time: 15:46
 */

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class CarreraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'fecha'=>$this->created_at,
            'usuarioSolicitanteId'=>$this->usuario_solicitante_id,
            'conductorId'=>$this->conductor_id,
            'latitudOrigen'=>$this->latitud_origen,
            'longitudOrigen'=>$this->longitud_origen,
            'latitudDestino'=>$this->latitud_destino,
            'longitudDestino'=>$this->longitud_destino,
            'origen'=>$this->origen,
            'destino'=>$this->destino,
            'montoEstimado'=>$this->monto_estimado,
            'estado'=>$this->estado,
            'solicitante'=> new UserResource($this->whenLoaded('solicitante')),
            'conductor'=> new ConductorResource($this->whenLoaded('conductor')),
        ];
    }
}