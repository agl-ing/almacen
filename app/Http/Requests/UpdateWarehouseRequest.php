<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateWarehouseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'code.required'               => 'El *PUESTO * es requerido',
            'code.string'                 => 'El *PUESTO * debe ser una cadena',
            'name.required'               => 'El *NOMBRE DEL ALMACEN* es requerido',
            'name.string'                 => 'El *NOMBRE DEL ALMACEN* debe ser un texto',
            'description.string'          => 'La *DESCRIPCIÓN* debe ser una cadena de texto',
            'maximum_quantity.required'   => 'La *CANTIDAD MAXIMA* por almacen es requerido',
            'maximum_quantity.integer'    => 'La *CANTIDAD MAXIMA* por almacen debe ser un número',
            'coordinates.required'        => 'Las *COORDENADAS* es requerido',
            'coordinates.string'          => 'Ocurrio un error en el campo *COORDENADAS*',
            'status.required'             => 'El *ESTATUS* es requerido',
            'status.boolean'              => 'Ocurrio un error con el campo *ESTATUS*',
        ];
    }

      /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'name'        => Str::upper($this->name),
            'description' => Str::upper($this->description),
            'created_at'  => Carbon::now('UTC'),
            'updated_at'  => Carbon::now('UTC'),
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
            'code'             => 'required|integer',
            'name'             => 'required|string',
            'description'      => 'nullable|string',
            'maximum_quantity' => 'required|integer',
            'coordinates'      => 'required|string',
            'status'           => 'required|boolean'
        ];
    }
}
