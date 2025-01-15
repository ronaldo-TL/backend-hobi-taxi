<?php
/**
 * Created by PhpStorm.
 * User: jhon_
 * Date: 16/12/2024
 * Time: 18:43
 */

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreComisionRequest extends FormRequest
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
            'conductor_id'=>$this->conductorId,
            'fecha_inicio'=>$this->fechaInicio,
            'fecha_fin'=>$this->fechaFin
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
            'conductor_id'=>['required'],
            'fecha_inicio'=>['required'],
            'fecha_fin'=>['required']
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ApiResponse::error($validator->errors()->first()));
    }
}