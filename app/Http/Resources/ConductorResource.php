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

class ConductorResource extends JsonResource
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
            'usuarioId'=>$this->usuario_id,
            'celular'=>$this->celular,
            'direccionResidencial'=>$this->direccion_residencial,
            'marca'=>$this->marca,
            'modelo'=>$this->modelo,
            'placa'=>$this->placa,
            'estado'=>$this->estado,
            'color'=>$this->color,
            'rutaImagenFoto'=>$this->ruta_imagen_foto,
            'rutaImagenLicencia'=>$this->ruta_imagen_licencia,
            'usuario'=> new UserResource($this->whenLoaded('usuario'))
        ];
    }
}