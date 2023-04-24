<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ $product->ProductName }}
    </h2>
  </x-slot>

      <div class="py-6">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover caption-top">
                                    <caption>{{ __('Details of product') }}</caption>
                                    <thead>
                                      <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Nombre producto</th>
                                        <th scope="col">Fecha de ingreso</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Precio compra</th>
                                        <th scope="col">Precio venta</th>
                                        <th scope="col">Ganancia</th>
                                        <th scope="col">Fecha de vencimiento</th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                      <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->ProductCode }}</td>
                                        <td>{{ $product->ProductName }}</td>
                                        <td>{{ date('d-m-Y', strtotime($product->EntryDate)) }}</td>
                                        <td>{{ $product->InventoryStock }}</td>
                                        <td>
                                          @switch($product->ProductCategory)
                                            @case('AL'){{$category = "Alimentos";}}@break
                                            @case('AG'){{$category = "Arena de gatos";}}@break
                                            @case('FM'){{$category = "Farmacia";}}@break
                                            @case('PL'){{$category = "Peluqueria";}}@break
                                            @case('AC'){{$category = "Accesorios";}}@break
                                            @case('MB'){{$category = "Mobiliarios";}}@break
                                            @default
                                          @endswitch
                                        </td>
                                        <td>{{ $product->ProductPurchasePrice }}</td>
                                        <td>{{ $product->ProductPrice }}</td>
                                        <td>{{ $product->ProductProfit }}</td>
                                        <td>
                                            @if ($product->ExpirationDate)
                                                {{ date('d-m-Y', strtotime($product->ExpirationDate)) }}
                                            @else
                                                {{ $product->ExpirationDate }}
                                            @endif
                                        </td>
                                      </tr>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td>
                                          <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Volver</a>
                                        </td>
                                      </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
</x-app-layout>
