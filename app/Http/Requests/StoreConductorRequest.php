<?php
/**
 * Created by PhpStorm.
 * User: jhon_
 * Date: 15/12/2024
 * Time: 17:15
 */

namespace App\Http\Requests;


use App\Helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreConductorRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !!$this->user();
    }

    protected function prepareForValidation()
    {

        $this->merge([
            'numero_documento'=>$this->numeroDocumento,
            'nombres'=>$this->nombres,
            'primer_apellido'=>$this->primerApellido,
            'segundo_apellido'=>$this->segundoApellido,
            'celular'=>$this->celular,
            'correo_electronico'=>$this->correoElectronico,
            'direccion_residencial'=>$this->direccionResidencial,
            'marca'=>$this->marca,
            'modelo'=>$this->modelo,
            'placa'=>$this->placa,
            'name'=>'conductor.'.$this->numeroDocumento,
            'rol_id'=>config('constants.ROL_CONDUCTOR'),
            'password'=>$this->numeroDocumento
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name' => ['required','min:4'],
            'rol_id'=>['required'],
            'numero_documento' => ['required','min:4'],
            'nombres' => ['required'],
            'primer_apellido'=>['nullable'],
            'segundo_apellido'=>['nullable'],
            'celular'=>['required','min:8'],
            'correo_electronico'=>['required','email'],
            'direccion_residencial'=>['required'],
            'marca'=>['required'],
            'modelo'=>['required'],
            'placa'=>['required'],
            'password'=>['required']
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ApiResponse::error($validator->errors()->first()));
    }

}
