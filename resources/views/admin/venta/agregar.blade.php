@extends('admin.dashboard')


@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/campoVisible.css') }}">

    <div class="page-header">
        <h3 class="page-title">
            Registrar pedido
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Registrar pedido</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Registrar pedido</h4>
                <p class="card-description">

                </p>

                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="forms-sample" action="{{route('venta.guardarVenta')}}" method="POST" enctype="multipart/form-data">
                    <div class="contenedor" style="display:flex; justify-content:space-around">
                        <div class="formulario" style="min-width:380px;">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nombres *</label>
                                <input name="nombres" type="text" value="{{ old('nombres') }}" class="form-control"
                                    id="nombres" placeholder="nombres" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Apellidos *</label>
                                <input name="apellidos" value="{{ old('apellidos') }}" type="text" class="form-control"
                                    id="apellidos" placeholder="apellidos" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Cédula *</label>
                                <input name="cedula" value="{{ old('cedula') }}" type="text" class="form-control"
                                    id="cedula" placeholder="cedula" required>
                            </div>


                            <div class="form-group">
                                <label for="codigo">Correo electrónico *</label>
                                <input name="correo" value="{{ old('correo') }}" type="text" class="form-control"
                                    id="correo" placeholder="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="codigo">Teléfono *</label>
                                <input name="telefono" value="{{ old('telefono') }}" type="text" class="form-control"
                                    id="telefono" placeholder="telefono" required>
                            </div>

                            <div class="form-group">
                                <label for="codigo">Cargo *</label>
                                <input name="cargo" value="{{ old('cargo') }}" type="text" class="form-control"
                                    id="cargo" placeholder="cargo">
                            </div>
                            <div class="form-group">
                                <label for="codigo">Ciudad *</label>
                                <select class="form-control" name="ciudad" id="ciudad" class="myniceselect nice-select wide" required>
                                    <option data-display="Quito">Quito</option>
                                    <option value="SantoDomingo">Santo Domingo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="canton">Cantón *</label>
                                <input name="canton" value="{{ old('canton') }}" type="text" class="form-control"
                                    id="canton" placeholder="Cantón" required>
                            </div>
                            {{-- <div class="form-group">
        <label for="codigo">Código postal *</label>
        <input name="codigopostal" type="text" class="form-control" id="exampleInputName1" placeholder="codigopostal" required>
      </div> --}}
                            <div class="form-group">
                                <label for="codigo">Dirección *</label>
                                <input name="direccion" value="{{ old('direccion') }}" type="text" class="form-control"
                                    id="direccion" placeholder="dirección" required>
                            </div>

                            <div class="form-group">
                                <label for="codigo">Lugar de trabajo *</label>
                                <input name="lugar_trabajo" value="{{ old('lugar_trabajo') }}" type="text"
                                    class="form-control" id="lugar_trabajo" placeholder="lugar de trabajo" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">Imagen del deposito *</label>
                                <input name="imagen" type="file" class="form-control" id="imagen">
                            </div>

                            {{-- <button type="submit" class="btn btn-primary mr-2">Enviar</button> --}}
                            {{-- <button class="btn btn-light">Cancelar</button> --}}

                        </div>

                        <div class="datosPedido">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="text-align:center">
                                        <i class="fas fa-shopping-basket"></i>
                                        Datos del carrito
                                    </h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Producto
                                                    </th>
                                                    <th>
                                                        Descripción
                                                    </th>
                                                    <th>
                                                        Total ($)
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($shopping_cart->shopping_cart_details as $scd)
                                                    <tr>
                                                        <td class="py-1">
                                                            <img src="{{ $scd->producto->images->pluck('url')[0] }}"
                                                                alt="profile" class="img-sm rounded-circle" />
                                                        </td>
                                                        <td>
                                                            {{ $scd->producto->nombre }} x {{ $scd->cantidad }}
                                                        </td>
                                                        <td>
                                                            ${{ $scd->cantidad * $scd->precio }}
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                <tr id="tdiva">
                                                    <td>
                                                        <input type="hidden" name="iva" id="iva"
                                                            value="{{ $empresa->iva }}" class="iva form-control" />
                                                        <input type="hidden" id="totalprecios"
                                                            value="{{ $shopping_cart->total_precios() }}" />
                                                        <input type="hidden" id="subtotalcarrito" name="subtotalcarrito"
                                                            value="{{ $shopping_cart->subtotal() }}" />
                                                        <input type="hidden" id="subtotalcarrito2"
                                                            value="{{ $shopping_cart->subtotal() }}" />
                                                        <input type="hidden" id="totalimpuesto" name="totalimpuesto"
                                                            value="{{ $shopping_cart->total_impuesto() }}" />
                                                        <input type="hidden" id="totalreq" name="totalreq" />
                                                   
                                                     
                                                    </td>

                                                    <td>
                                                        
                                                    </td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td>Subtotal</td>
                                                    <td style="font-weight: bold">$<span id="subtotal">0</span></td>


                                                </tr>
                                                <div class="body2" id="body2">

                                                    {{-- SELECCIONAR LA FORMA DE PAGO --}}
                                                    <tr>
                                                        <td></td>
                                                        <td style="font-weight:bold;">Forma de pago</td>
                                                        <td style="font-weight: bold">
                                                            <select id="formapago" onchange="formaPago()" 
                                                                class="form-control" name="formapago"
                                                                class="myniceselect nice-select wide" required>
                                                                <option selected="true" disabled>seleccione la forma
                                                                </option>
                                                                <option value="1">Contado</option>
                                                                <option value="2">Crédito</option>
                                                            </select>

                                                        </td>
                                                    </tr>

                                                    <div class="es_credito ">
                                                        {{-- VALOR DE ABONO COMO ENTRADA --}}
                                                        <tr id="tr1" style="display:none">
                                                            <td></td>
                                                            <td style="font-weight:bold;">Monto de entrada</td>
                                                            <td style="font-weight: bold">
                                                                <input id="entrada" type="number" min="0" 
                                                                    class="form-control entrada" name="abono" />
                                                            </td>
                                                        </tr>

                                                        {{-- diferir A DIFERIR --}}
                                                        <tr id="tr2" style="display:none">
                                                            <td></td>
                                                            <td style="font-weight:bold;">meses a diferir
                                                            </td>
                                                            <td style="font-weight: bold">
                                                                <input id="mesesdiferir" type="number" min="1" max="24"
                                                                    class="form-control mesesdiferir"  name="mesesdiferir" />
                                                            </td>
                                                        </tr>

                                                        {{-- CUOTAS A PAGAR POR LOS MESES INGRESADOS --}}
                                                        <tr id="tr3" style="display:">
                                                            <td></td>
                                                            <td style="font-weight:bold;">Cuotas a pagar:</td>
                                                            <td style="font-weight: bold">
                                                              <input id="cuotas"  class="form-control cuotas" type=number name="cuotas">
                                                            </td>
                                                        </tr>
                                                    </div>


                                                    <div class="es_contado" id="es_contado">
                                                        {{-- SI ES COMPRA DE CONTADO, SE APLICARA UN DESCUENTO --}}
                                                        <tr id="tr4" style="display:">
                                                            <td></td>
                                                            <td style="font-weight:bold;">Descuento:</td>
                                                            <td style="font-weight: bold">
<input type="number" class="form-control descuento" name="descuento">
                                                            </td>
                                                        </tr>
                                                    </div>


                                                    {{-- MONTO TOTAL A CANCELAR POR PARTE DEL COMPRADOR --}}
                                                    <tr>
                                                        <td></td>
                                                        <td style="font-weight:bold;">Total a pagar:</td>
                                                        <td style="font-weight: bold">
                                                            $<span id="total">0</span>
                                                        </td>
                                                    </tr>
                                                </div>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="opciones my-2 mx-auto">
                                    <a class="btn btn-info" href="{{ url('/tienda') }}"><i class="fas fa-reply"></i>
                                        Ir
                                        a tienda</a>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                    {{-- <button class="btn btn-light">Cancelar</button> --}}
                                    <a class="btn btn-warning" href="{{ url('/cesta') }}"><i class="fas fa-edit"></i>
                                        Editar</a>
                                    {{-- <a class="btn btn-success" id="btncalcular" onclick="calcular()"><i
                                            class="fas fa-calculator"></i> Calcular</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>


    <script>
      
      function validar()
      {
        if(document.getElementById('nombres').value!='' && document.getElementById('apellidos').value!='' && document.getElementById('cedula').value!='' && document.getElementById('telefono').value!='' && document.getElementById('ciudad').value!='' && document.getElementById('direccion').value!='' && document.getElementById('cargo').value!='' && document.getElementById('lugar_trabajo')!='' && document.getElementById('correo').value !='' ){
          document.getElementById('formapago').disabled = false;
        }

        }
      

      document.addEventListener('DOMContentLoaded', e => {
            document.getElementById('nombres').addEventListener('change', validar);
            document.getElementById('apellidos').addEventListener('change', validar);
            document.getElementById('cedula').addEventListener('change', validar);
            document.getElementById('telefono').addEventListener('change', validar);
            document.getElementById('cargo').addEventListener('change', validar);
            document.getElementById('ciudad').addEventListener('change', validar);
            document.getElementById('correo').addEventListener('change', validar);
            document.getElementById('direccion').addEventListener('change', validar);
            document.getElementById('lugar_trabajo').addEventListener('change', validar);
        });
        var totalPagar = 0,
            interes = 6,
            iva = document.getElementById('iva').value,
            totalprecios = document.getElementById('totalprecios').value;
        var subtotal = 0,
            textoIva = document.getElementById('ivacalculado'),
            opcionFormaPago = document.getElementById('formapago');
        var descuento = 10,
            textoTotalPagar = document.getElementById('total'),
            textoSubtotal = document.getElementById('subtotal');
        var band = false;
        var tr1 = document.getElementById('tr1').style;
        var tr2 = document.getElementById('tr2').style;
        var tr3 = document.getElementById('tr3').style;
        var tr4 = document.getElementById('tr4').style;

        function formaPago() {
            band = true;
            opcionFormaPago = document.getElementById('formapago').value; //actualizamos el valor de opcionFormaPago
            if (opcionFormaPago == 2) //CREDITO
            {
              textoTotalPagar.textContent = document.getElementById('subtotalcarrito').value;
                tr1.display = ''; //habilitamos el input de entrada
                tr2.display = ''; //habilitamos el input de entrada
                tr3.display = ''; //cuota y mesescuota
                tr4.display = 'none'; //habilitamos el             
            } else { //CONTADO
                tr2.display = 'none';
                tr1.display = 'none';
                tr3.display = 'none', tr4.display = '';
            }
        }

        function leerEntrada(e) {
            if (document.getElementById('mesesdiferir').value == ''  || document.getElementById('cuotas').value!='') {
                alert('No olvide agregar los meses y la cuota');
            } else {
                var entrada = e.target.value;
               var meses =  document.getElementById('mesesdiferir').value;
                var cuotas = document.getElementById('cuotas').value;
                textoTotalPagar.textContent = cuotas*meses;
                document.getElementById('totalreq').value = textoTotalPagar.textContent;
                // document.getElementById('cuotas').value = cuotas;
                // document.getElementById('meses').value = mesesdiferir;
                
            }
        }
        function leerMeses(e) {
            if (document.getElementById('entrada').value == '' || document.getElementById('cuotas').value=='') {
                alert('No olvide agregar la entrada y la cuota');
            } else {
                var entrada = document.getElementById('entrada').value;
               var meses =  e.target.value;
                var cuotas = document.getElementById('cuotas').value;
                textoTotalPagar.textContent = cuotas*meses;
                document.getElementById('totalreq').value = textoTotalPagar.textContent;
                // document.getElementById('cuotas').value = cuotas;
                // document.getElementById('meses').value = mesesdiferir;
                
            }
        }

        function leerCuota(e) {
            if (document.getElementById('mesesdiferir').value == '' || document.getElementById('entrada').value=='') {
                alert('No olvide agregar la entrada y los meses');
            } else {
                var cuotas = e.target.value;
               var meses =  document.getElementById('mesesdiferir').value;
                var entrada = document.getElementById('entrada').value;
                textoTotalPagar.textContent = cuotas*meses;
                document.getElementById('totalreq').value = textoTotalPagar.textContent;
                // document.getElementById('cuotas').value = cuotas;
                // document.getElementById('meses').value = mesesdiferir;
                
            }
        }

        function leerDesc(e){
          var descuento = e.target.value;
               textoTotalPagar.textContent =  document.getElementById('subtotalcarrito').value-descuento;
              document.getElementById('totalreq').value = textoTotalPagar.textContent;
        }
        
        document.addEventListener('DOMContentLoaded', e => {
          document.getElementById('subtotal').textContent = document.getElementById('subtotalcarrito').value;
          tr3.display = 'none'; //cuota y mesescuota
          tr4.display = 'none'; //cuota y mes
          document.querySelector('.entrada').addEventListener('change', leerEntrada);
            document.querySelector('.mesesdiferir').addEventListener('change', leerMeses);
            document.querySelector('.cuotas').addEventListener('change', leerCuota);
            document.querySelector('.descuento').addEventListener('change', leerDesc)
            textoTotalPagar.textContent = document.getElementById('subtotalcarrito').value;
        });
    </script>
@endsection
