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

class ComisionResource extends JsonResource
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
            'coductorId'=>$this->conductor_id,
            'fechaInicio'=>$this->fecha_inicio,
            'fechaFin'=>$this->fecha_fin,
            'monto'=>$this->monto,
            'conductor'=> new ConductorResource($this->whenLoaded('conductor')),
        ];
    }
}