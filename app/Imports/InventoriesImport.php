<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class InventoriesImport implements ToModel, WithHeadingRow, WithUpserts

{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inventory([
          'ProductCode' => $row['codigo'],
          'ProductName' => $row['nombre_producto'],
          'EntryDate' => $row['fecha_ingreso'],
          'ExpirationDate' => $row['fecha_vencimiento'],
          'ProductPurchasePrice' => $row['precio_compra'],
          'ProductCategory' => $row['categoria'],
          'ProductProfit' => $row['ganancia'],
          'InventoryStock' => $row['cantidad'],
          'ProductPrice' => $row['precio_venta'],
          'ProductImage' => $row['imagen'],
        ]);
    }

    public function uniqueBy()
    {
        return 'ProductCode';
    }
}
