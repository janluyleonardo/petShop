<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Sale;
use Illuminate\Http\Request;
use PDF;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sales = Sale::where('ProductSaleDate','>=', now()->format('Y-m-d'))
      ->where('InvoiceNumber','=',null)->get();

      $allSales = Sale::where('InvoiceNumber','<>',null)
      ->where('ProductSaleDate','>=', now()->format('Y-m-d'))
      ->get();

      $products = Inventory::where('InventoryStock','>=',1)->get();
      return view('sales.index',compact('products','sales','allSales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $request->validate([
        'productAmount'=>'required',
        'ProductCode'=>'required',
      ]);
      $SaleDate = now()->format('Y-m-d');
      $productAmount = $request->productAmount;
      $ProductCode = $request->ProductCode;
      //obtengo los datos del producto que se agregara a la tabla venta * dia
      $productSales = Inventory::where('ProductCode','=',$ProductCode)->get();
      if($productSales->isEmpty()){
        return redirect()->route('sales.index')->dangerBanner('no pude consultar los registros, ya que no diligencio los campos de busqueda!');
      }else{
        foreach ($productSales as $productSale) {
          $oldName = $productSale->ProductName;
          $oldStock = $productSale->InventoryStock;
          $oldPrice = $productSale->ProductPrice;
        }
        $updateStock = $oldStock - $productAmount;
        $invoiceTotal = $oldPrice * $productAmount;
        // $updateproduct = new Inventory();
        try {
          $productSales->toQuery()->update(['InventoryStock'=>$updateStock]);
        } catch (\Throwable $th) {
          return $th->getMessage();
          return redirect()->route('sales.index')->dangerBanner('no pude actualizar el registro de : '.$oldName);
        }
        $insert = new Sale();

        $insert->ProductCode = $ProductCode;
        $insert->ProductName = $oldName;
        $insert->ProductAmount = $productAmount;
        $insert->ProductPrice = $oldPrice;
        $insert->InvoiceTotal = $invoiceTotal;
        $insert->ProductSaleDate = $SaleDate;
        try {
          $insert->save();
        } catch (\Throwable $th) {
          return $th->getMessage();
          return redirect()->route('sales.index')->dangerBanner('no pude insertar el registro de : '.$oldName);
        }
      }
      return redirect()->route('sales.index')->banner('Producto registrado correctamente.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function printInvoice(Request $request)
    {
      $invoiceNumber = now()->format('Ymdhis');

      $update = Sale::where('InvoiceNumber','=',null)
        ->update([
          'InvoiceNumber' => $invoiceNumber,
        ]);

      $invoices = Sale::where('ProductSaleDate','>=', now()->format('Y-m-d'))
      ->where('InvoiceNumber','=', $invoiceNumber)->get();

      // return $invoices;


      $customPaper = array(0,0,567.00,283.80);
      $pdf = PDF::loadView('sales.invoice',compact('invoices','invoiceNumber'))->setPaper($customPaper,'landscape');
      return $pdf->stream('Factura universal pet.pdf');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
