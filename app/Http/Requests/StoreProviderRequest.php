<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreProviderRequest extends FormRequest
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
            'name.required'      => 'El *NOMBRE DEL PROVEEDOR* es requerido',
            'name.string'        => 'El *NOMBRE DEL PROVEEDOR* debe ser un texto',
            'tradename.required' => 'El *NOMBRE COMERCIAL DEL PROVEEDOR* es requerido',
            'tradename.string'   => 'El *NOMBRE COMERCIAL DEL PROVEEDOR* debe ser un texto',
            'description.string' => 'La *DESCRIPCION* debe ser un texto',
            'status.required'    => 'El *ESTATUS* es requerido',
            'status.boolean'     => 'Ocurrio un error con el campo *ESTATUS*',
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
            'tradename'   => Str::upper($this->tradename),
            'description' => Str::upper($this->description), 
            'code'        => Str::random(6),
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
            'name'        => 'required|string',
            'tradename'   => 'required|string',
            'description' => 'nullable|string',
            'status'      => 'required|boolean'
        ];
    }
}
