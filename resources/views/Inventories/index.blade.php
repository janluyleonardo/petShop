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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover caption-top" >
                                    <caption>List of inventories</caption>
                                    <a href="http://" class="btn btn-success">Agregar producto</a>
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Nombre producto</th>
                                            <th scope="col">descripcion producto</th>
                                            <th scope="col">Fecha de compra</th>
                                            <th scope="col">Fecha de vencimiento</th>
                                            <th scope="col">Cantidad comprada</th>
                                            <th scope="col">Precio unitario</th>
                                            <th scope="col">Cantidad stok</th>
                                            <th scope="col">Valor stok disponible</th>
                                            <th scope="col">Cantidad de pedido</th>
                                            <th scope="col">Cantidad de vendida</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($inventories as $product)
                                        <tr>
                                            <th scope="row">{{$i}}</th>
                                            <td>{{$product->ProductCode}}</td>
                                            <td>{{$product->ProductName}}</td>
                                            <td>{{$product->ProductDescription}}</td>
                                            <td>{{$product->PurchaseDate}}</td>
                                            <td>{{$product->ExpirationDate}}</td>
                                            <td>{{$product->InventoryStock}}</td>
                                            <td>{{$product->ProductPrice}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>{{$product->updated_at}}</td>
                                            <td>@fat</td>
                                            <td>Jacob</td>
                                            <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a title="Show" href="" class="sombra btn btn-primary" data-bs-toggle="modal">{{__('See')}}</a>
                                                <a title="Editar" href="{{ route('inventories.edit', $product) }}" class="sombra btn btn-info" >{{__('Edit')}}</a>
                                                <a title="Eliminar" href="" class="sombra btn btn-danger" data-bs-toggle="modal">{{__('Delete')}}</a>
                                            </div>
                                            </td>
                                        </tr>
                                        <?php $i += 1; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{$inventories->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
