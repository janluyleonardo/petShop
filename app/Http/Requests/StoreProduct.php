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
            'ProductCode'=>'required | min:6',
            'ProductName'=>'required | min:6',
            'ProductDescription'=>'required | min:6',
            'PurchaseDate'=>'required | date',
            'ExpirationDate'=>'required | date',
            'InventoryStock'=>'required | numeric',
            'ProductPrice'=>'required | numeric',
        ];
    }

    public function attributes()
    {
        return [
            'ProductCode' => 'Codigo de producto',
            'ProductName' => 'Nombre de producto',
            'ProductDescription' => 'Descripcion del producto',
            'PurchaseDate' => 'Fecha de compra del producto',
            'ExpirationDate' => 'Fecha de vencimiento del producto',
            'InventoryStock' => 'Cantidad de producto',
            'ProductPrice' => 'Cantidad de producto',
        ];
    }

    public function messages()
    {
        return [
            'ProductCode' => 'Debe ingresar un codigo de producto',
            'ProductName' => 'Debe ingresar un nombre de producto',
            'ProductDescription' => 'Debe ingresar una descripcion del producto',
            'PurchaseDate' => 'Debe ingresar una fecha de compra del producto',
            'ExpirationDate' => 'Debe ingresar una fecha de vencimiento del producto',
            'InventoryStock' => 'Debe ingresar una cantidad del producto',
            'ProductPrice' => 'Debe ingresar una cantidad del producto',
        ];
    }
}
