<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Documento de venta</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .fila
    {
      text-align: center;
    }

    .color {
      background-color:green;
      height:20px;
      width:20px;
      border-radius:100%;
    }


</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="../public/images/logo/logoAlexa.png" alt="d" width="300"/></td>
        <td align="right">
            <h3>Factura # 000{{$venta->id}}</h3>
            <pre>
                Av. Simón Plata Torres y 9 de Octubre
                0988703045
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%">
    <tr>
        <td><strong>Responsable:</strong> Gustavo Morales</td>
        <td align="right"><strong>Para:</strong> {{$cliente->nombre_completo}}</td>
    </tr>
    <tr>
      <td><strong></strong></td>
      <td align="right"><strong>C.I:</strong> {{$cliente->cedula}}</td>
  </tr>
  <tr>
    <td><strong></strong></td>
    <td align="right"><strong>Teléfono:</strong> {{$cliente->telefono}}</td>
</tr>
<tr>
  <td><strong></strong></td>
  <td align="right"><strong>Dirección:</strong> {{$cliente->ciudad}},<br/> {{$cliente->canton}},<br/> {{$cliente->direccion}}</td>
</tr>
  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Precio Unitario $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      @foreach($venta->detalles_venta as $key => $detalle_venta)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td class="fila">{{$detalle_venta->producto->nombre}} cod:{{$detalle_venta->producto->codigo}}, marca:{{$detalle_venta->producto->marca}} mod:{{$detalle_venta->producto->modelo}} <p >color: <strong class="color">"   "</strong></p>
        <td class="fila" align="right">{{$detalle_venta->cantidad}}</td>
        <td class="fila" align="right">{{$detalle_venta->precio}}</td>
        <td class="fila" align="right">{{$detalle_venta->cantidad*$detalle_venta->precio}}</td>
      </tr>
      @endforeach
    </tbody>

    <tfoot>
      @if(isset($entrada))
        <tr>
          <td colspan="3"></td>
          <td  align="right">Entrada $</td>
          <td class="fila" align="right">{{$entrada}}</td>
      </tr>
        @endif
        <tr>
            <td colspan="3"></td>
            <td  align="right">Subtotal $</td>
            <td class="fila" align="right">{{$venta->total}}</td>
        </tr>
        
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            @if(isset($entrada))
            <td class="fila" align="right" class="gray">${{$venta->total+$entrada}}</td>
            @else 
            <td class="fila" align="right" class="gray">${{$venta->total}}</td>
            @endif
        </tr>
    </tfoot>
  </table>

</body>
</html>