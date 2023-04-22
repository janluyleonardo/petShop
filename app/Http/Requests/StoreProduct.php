<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'InventoryStock'=>'required | numeric',
            'ProductName'=>'required | min:6',
            'ProductPurchasePrice'=>'required | numeric',
            'EntryDate'=>'required | date',
            'ProductCategory'=>'required | string',
        ];
    }

    public function attributes()
    {
        return [
            'InventoryStock' => 'Cantidad de producto',
            'ProductName'=>'Nombre de producto',
            'ProductPurchasePrice'=>'Costo unitario',
            'EntryDate'=>'Fecha de ingreso',
            'ProductCategory'=>'Categoria del producto',
        ];
    }

    public function messages()
    {
        return [
            'InventoryStock' => 'Ingresar la cantidad de producto',
            'ProductName'=>'Ingresar el nombre del producto',
            'ProductPurchasePrice'=>'Ingrese el costo unitario del producto',
            'EntryDate'=>'Ingrese una fecha de ingreso del producto',
            'ProductCategory'=>'Ingrese una categoria del producto',
        ];
    }
}
