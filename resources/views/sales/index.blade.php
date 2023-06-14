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
            <div class="col-md-6 mx-auto py-3">
              <form method="get" action="{{route('sales.create')}}">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="ProductCode" class="col-sm-12 col-form-label">{{__('ProductName')}}</label>
                    @if ($products->isEmpty())
                    @else
                    <select class="form-control" name="ProductCode" id="ProductCode">
                      <option disabled selected>Seleccione producto</option>
                        @foreach ($products as $product)
                        <option value="{{$product->ProductCode}}">{{$product->ProductName}}</option>
                        @endforeach
                      @endif
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
                    {{-- <label for="productAmount" class="col-sm-6 col-form-label">{{__('Amo</label> --}}
                    <div class="mt-3 col-md-12 mx-auto text-center">
                      <button type="submit" class="btn btn-success sombra">{{__('Add product')}}</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-12">
              <div class="col-md-10 mx-auto">
                @if ($sales->isEmpty())
                  <div class="col-md-12 mt-2 text-center">
                    <strong>
                      Aun no tenemos registros para mostrar, por favor agrega manualmente los
                      registros de la venta del dia.
                    </strong>
                  </div>
                @else
                  <table class="table table-striped table-sm table-hover caption-top">
                    <caption>{{ __('List of sales in day') .": ".count($sales)}}</caption>
                    <thead>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Fecha venta</th>
                    </thead>
                    <tbody>
                    @foreach ($sales as $sale)
                    <tr>
                      <td>{{$sale->ProductCode}}</td>
                      <td>{{$sale->ProductName}}</td>
                      <td>{{$sale->ProductAmount}}</td>
                      <td>{{$sale->ProductPrice}}</td>
                      <td>{{$sale->created_at}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                      </tr>
                    </tfoot>
                  </table>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
