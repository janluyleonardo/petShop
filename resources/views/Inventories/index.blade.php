<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container-fluid py-2">
                    <div class="row form-row flex-row-reverse">
                        <div class="col-md-2 mx-auto">
                            <a title="Create" href="{{ route('inventories.create') }}" class="sombra btn btn-success">{{ __('Add product') }}</a>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                @if ($inventories->isEmpty())
                                    <div class="col-md-12 mt-2 text-center">
                                        <strong>
                                          Aun no tenemos registros para mostrar, por favor agrega manualmente los
                                          registros o de manera masiva cargando un excel
                                        </strong>
                                    </div>
                                @else
                                    <table class="table table-striped table-sm table-hover caption-top">
                                        <caption>{{ __('List of inventories') }}</caption>
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Codigo</th>
                                                <th scope="col">Nombre producto</th>
                                                <th scope="col">Fecha de ingreso</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio compra</th>
                                                <th scope="col">Precio venta</th>
                                                <th scope="col">Ganancia</th>
                                                <th scope="col">Fecha de vencimiento</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($inventories as $product)
                                                <tr>
                                                    <th scope="row">{{ $i }}</th>
                                                    <td>{{ $product->ProductCode }}</td>
                                                    <td>{{ $product->ProductName }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($product->EntryDate)) }}</td>
                                                    <td>{{ $product->InventoryStock }}</td>
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
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic example">
                                                            <a title="Show"
                                                                href="{{ route('inventories.show', $product) }}"
                                                                class="sombra btn btn-primary btn-sm">{{ __('See') }}</a>
                                                            <a title="Edit"
                                                                href="{{ route('inventories.edit', $product) }}"
                                                                class="sombra btn btn-info btn-sm">{{ __('Edit') }}</a>
                                                            <a title="Delete" href="#deleteModal{{ $product->id }}"
                                                                class="sombra btn btn-danger btn-sm"
                                                                data-bs-toggle="modal">{{ __('Delete') }}</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i += 1; ?>
                                                <!-- Modal delete-->
                                                <div class="modal fade" id="deleteModal{{ $product->id }}"
                                                    tabindex="-1" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content sombra bg-white">
                                                            <div class="modal-header sombra bn-100">
                                                                <button type="button" class="btn-close sombra"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body sombra">
                                                                Esta seguro(a) de eliminar el registro de:<br>
                                                                <strong>{{ Str::upper($product->ProductName) }}</strong>
                                                            </div>
                                                            <div class="modal-footer bn-100">
                                                                <button type="button" class=" sombra btn btn-warning"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <form
                                                                    action="{{ route('inventories.destroy', $product) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class=" sombra btn btn-danger">
                                                                        Eliminar registro
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{ $inventories->links() }}
                </div>
                <div class="container mb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-light mt-3">
                                <div class="card-header">
                                    {{ __('Upload file with product inventory') }}.
                                    <strong>
                                        <a href="{{ asset('complementFiles/carga.xlsx') }}">Aca tienes un ejemplo</a>
                                    </strong>
                                </div>
                                <div class="card-body d-flex">
                                    <div class="col-md-6 mx-auto">
                                        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <x-input-file></x-input-file>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button class="sombra btn btn-success ml-6" width="50%" type="submit">{{ __('Import User Data') }}</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <a class="sombra btn btn-warning ml-6" width="50%" href="{{ route('export') }}">{{ __('Export Inventory Data') }}</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
