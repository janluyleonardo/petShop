<table class="table table-striped">
  <thead>
      <tr>
          <th scope="col"><b>{{__('Id')}}</b></th>
          <th scope="col"><b>{{__('Codigo')}}</b></th>
          <th scope="col"><b>{{__('Cantidad')}}</b></th>
          <th scope="col"><b>{{__('Nombre producto')}}</b></th>
          <th scope="col"><b>{{__('Fecha de ingreso')}}</b></th>
          <th scope="col"><b>{{__('Fecha de vencimiento')}}</b></th>
          <th scope="col"><b>{{__('Precio compra')}}</b></th>
          <th scope="col"><b>{{__('Precio venta')}}</b></th>
          <th scope="col"><b>{{__('Ganancia')}}</b></th>
          <th scope="col"><b>{{__('Imagen')}}</b></th>
      </tr>
  </thead>
  <tbody>
      @foreach($inventories as $inventorie)
      <tr>
          <td>{{$inventorie->id}}</td>
          <td>{{$inventorie->ProductCode}}</td>
          <td>{{$inventorie->InventoryStock}}</td>
          <td>{{$inventorie->ProductName}}</td>
          <td>{{$inventorie->EntryDate}}</td>
          <td>{{$inventorie->ExpirationDate}}</td>
          <td>{{$inventorie->ProductPurchasePrice}}</td>
          <td>{{$inventorie->ProductPrice}}</td>
          <td>{{$inventorie->ProductProfit}}</td>
          <td>{{$inventorie->ProductImage}}</td>
      </tr>
      @endforeach
  </tbody>
</table>
