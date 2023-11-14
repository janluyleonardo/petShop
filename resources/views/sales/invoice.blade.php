<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ env('APP_URL') }}css/bootstrap.css" rel="stylesheet"> --}}
    <link href="{{ env('APP_URL') }}css/invoices.css" rel="stylesheet">
    <title>Factura de venta</title>
</head>

<body>
  <header>
    <div class="header">
      <img src="{{ env('APP_URL') }}image/logo-factura.png" alt="LOGO-jackeline" width="125">
    </div>
  </header>
  <div class="information">
    Calle 1 # 51A-93<br>B. La ponderosa.<br>Cel. 3246294707
  </div>
  <div class="information">
    <strong>Factura # {{$invoiceNumber}}</strong>
  </div>
  <main class="main">
    <table class="" width="100%" border="0">
        <tbody>
          @foreach ($invoices as $item)
            <tr>
              <td class="row-amount" rowspan="1" align="left">
                <div>{{$item->ProductAmount}}</div>
              </td>
              <td class="row-name" rowspan="1" colspan="4" align="center">
                <div>{{$item->ProductName}}</div>
              </td>
              <tr class="border-b">
              <td class="row-code" rowspan="1" colspan="2"  align="right">
                <div>SKU: {{$item->ProductCode}}</div>
              </td>
              <td class="row-price" rowspan="1" colspan="2"  align="right">
                <div>C/U: {{$item->ProductPrice}}</div>
              </td>
              <td class="row-subtotal" rowspan="1" align="right">
                <div>{{$item->InvoiceTotal}}</div>
              </td>
              </tr>
            </tr>
          @endforeach
        </tbody>
      </table>

        <div class="copy-client">
          <strong>Copia clente</strong>
        </div>
        <div class="total-invoice">
          <strong>Total: xxxxxx</strong>
        </div>
        <div class="iva-invoice">
          <strong>IVA: xxxxxx</strong>
        </div>
  </main>
  <footer>
    <center>
      <h2>!Gracias por tu compra¡</h2>
    </center>
  </footer>
</body>

</html>
