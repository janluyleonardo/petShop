<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Sales') }}
    </h2>
  </x-slot>
  <div class="py-6">
    <div class=" mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto py-3">
              @if ($products->isEmpty())
                <div class="col-md-12 mt-2 text-center">
                  <strong class="text-danger">
                    ¡Aún no se agregan productos para generar ventas!, verificar en el módulo de inventario que exista información.
                  </strong>
                </div>
              @else
              <form method="get" action="{{route('sales.create')}}">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="ProductCode" class="col-sm-12 col-form-label">{{__('ProductName')}}</label>
                    <select class="form-control" name="ProductCode" id="ProductCode">
                      <option disabled selected>Seleccione producto</option>
                      @foreach ($products as $product)
                      <option value="{{$product->ProductCode}}">{{$product->ProductName}}</option>
                      @endforeach
                    </select>
                    <div class="col-md-12">
                      @error('ProductCode')<small><strong class="text-danger">*{{ $message }}</strong></small><br>@enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="productAmount" class="col-sm-6 col-form-label">{{__('Amount')}}</label>
                    <div class="col-md-12">
                      <input type="number" class="form-control" id="productAmount" name="productAmount" placeholder="{{__('Amount')}}" value="{{ old('productAmount ') }}">
                      @error('productAmount')<small><strong class="text-danger">*{{ $message }}</strong></small><br>@enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="productAmount" class="col-sm-6 col-form-label"></label>
                    <div class="mt-3 col-md-12 mx-auto text-center">
                      <button type="submit" class="btn btn-success sombra">{{__('Add product')}}</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="col-md-12">
                <div class="col-md-10 mx-auto">
                  @if ($sales->isEmpty())
                  @else
                    <table class="table table-striped table-sm table-hover caption-top">
                      <thead>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Fecha venta</th>
                      </thead>
                      <tbody>
                      @foreach ($sales as $sale)
                      <tr>
                        <td>{{$sale->ProductCode}}</td>
                        <td>{{$sale->ProductName}}</td>
                        <td>{{$sale->ProductAmount}}</td>
                        <td>{{$sale->ProductPrice}}</td>
                        <td>{{$sale->InvoiceTotal}}</td>
                        <td>{{$sale->created_at}}</td>
                      </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="6">
                            <center>
                            <a href="{{route('printInvoice')}}" class="sombra btn btn-sm btn-primary">imprimir factura</a>
                            </center>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                  @endif
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="py-1">
    <div class=" mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="container">
          <div class="row">
            @if ($allSales->isEmpty())
            @else
              <table class="table table-striped table-sm table-hover caption-top">
                      <caption>Listado de las ventas del dia</caption>
                      <thead>
                        <th>Factura</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Fecha venta</th>
                      </thead>
                      <tbody>
                      @foreach ($allSales as $sale)
                      <tr>
                        <td>{{$sale->InvoiceNumber}}</td>
                        <td>{{$sale->ProductCode}}</td>
                        <td>{{$sale->ProductName}}</td>
                        <td>{{$sale->ProductAmount}}</td>
                        <td>{{$sale->ProductPrice}}</td>
                        <td>{{$sale->InvoiceTotal}}</td>
                        <td>{{$sale->created_at}}</td>
                      </tr>
                      @endforeach
                      </tbody>
                      {{-- <tfoot>
                        <tr>
                          <td colspan="6">
                            <center>
                            <a href="{{route('printInvoice')}}" class="sombra btn btn-sm btn-primary">imprimir factura</a>
                            </center>
                          </td>
                        </tr>
                      </tfoot> --}}
                    </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
