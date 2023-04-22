<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable =[
        'ProductCode',
        'ProductName',
        'EntryDate',
        'ExpirationDate',
        'ProductPurchasePrice',
        'ProductCategory',
        'ProductProfit',
        'InventoryStock',
        'ProductPrice',
        'ProductImage',
    ];
}
