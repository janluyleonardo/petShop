<?php

namespace App\Exports;

use App\Models\Inventory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InventoriesExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
      return view('exports.exportInventories',[
        'inventories' => Inventory::all()
    ]);
    }
}
