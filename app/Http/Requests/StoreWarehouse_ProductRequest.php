<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreWarehouse_ProductRequest extends FormRequest
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
            'warehouse_id.required' => 'El *ALMACEN* es requerido',
            'warehouse_id.integer'  => 'Ocurrio un error con el campo *ALMANCEN*',
            'product_id.required'   => 'El *PRODUCTO* es requerido',
            'product_id.integer'    => 'Ocurrio un error con el campo *PRODUCTO*',
            'qty.required'          => 'La *CANTIDAD* es requerido',
            'qty.integer'           => 'Ocurrio un error con el campo *CANTIDAD*',
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
            'status'      => 1,
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
            'warehouse_id' => 'required|integer',
            'product_id'   => 'required|integer',
            'qty'          => 'required|integer'
        ];
    }
}
