<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InventoriesExport;
use App\Imports\InventoriesImport;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::orderBy('id', 'desc')->paginate(10);
        return view('Inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Inventories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        // $code=0;
        $id = Inventory::orderBy('id','desc')->first();
        if($id == null){
            $code = "0001";
        }else{
            $cont = $id->id+1;
            $code = $cont;
        }

        $Code = str_pad($code, 5, "0", STR_PAD_LEFT);
        $ProductCode=$request->ProductCategory.$Code;

        $base = $request->ProductPurchasePrice;
        $ProductProfit = ($base*30)/100;

        $ProductPrice = $base+$ProductProfit;
        $product = new Inventory();
        $product->ProductCode = $ProductCode;
        $product->ProductName = $request->ProductName;
        $product->EntryDate = $request->EntryDate;
        $product->ExpirationDate = $request->ExpirationDate;
        $product->ExpirationDate = $request->ExpirationDate;
        $product->ProductPurchasePrice = $request->ProductPurchasePrice;
        $product->ProductCategory = $request->ProductCategory;
        $product->ProductProfit = $ProductProfit;
        $product->InventoryStock = $request->InventoryStock;
        $product->ProductPrice = $ProductPrice;
        $product->ProductImage = $request->ProductImage;
        try {
            $product->save();
        } catch (\Throwable $th) {
            return redirect()->route('inventories.index', $product)->bannerdanger('no se pudo agregar nuevo registro por que => '.$th);
        }
        return redirect()->route('inventories.index', $product)->banner('Registro creado correctamente.');
        // return $ProductCode."--".$ProductProfit."--".$ProductPrice;
        // return "entro en store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "entro en show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "entro en edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "entro en delete";
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
      return Excel::download(new InventoriesExport, 'inventories.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request)
    {
      $importFile = $request->file('importInventory');
      Excel::import(new InventoriesImport, $importFile);
      $inventories = Inventory::orderBy('id', 'desc')->paginate(10);
      return redirect()->route('inventories.index', $inventories)->banner('Datos importados exitosamente');
    }
}
