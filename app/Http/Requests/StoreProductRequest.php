<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreProductRequest extends FormRequest
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
            'name.required'      => 'El *NOMBRE DEL PRODUCTO* es requerido',
            'name.string'        => 'El *NOMBRE DEL PRODUCTO* debe ser un texto',
            'sku.required'       => 'El *SKU* es requerido',
            'sku.string'         => 'El *SKU* debe ser un texto',
            'description.string' => 'La *DESCRIPCION* debe ser un texto',
            'provider_id.integer'=> 'Ocurrio un error con el campo *PROVEEDOR*',
            'status.required'    => 'El *ESTATUS* es requerido',
            'status.boolean'       => 'Ocurrio un error con el campo *ESTATUS*',
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
            'sku'         => $this->sku,
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
            'name'        => 'required|string',
            'description' => 'nullable|string',
            'sku'         => 'required|string',
            'provider_id' => 'required|integer',
            'status'      => 'required|boolean'
        ];
    }
}
