@extends('admin.dashboard')


@section('contenido')
<div class="page-header">
    <h3 class="page-title">
      Detalles de la venta pagada
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalles de la venta pagada</li>
      </ol>
    </nav>
</div>
<div class="row">
      <div class="col-lg-12">
          <div class="card px-2">
              <div class="card-body">
                  <div class="container-fluid">
                    <h3 class="text-right my-5">Venta &nbsp;&nbsp;#{{$venta->id}}</h3>
                    <hr>
                  </div>
                  <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-3 pl-0">
                      <p class="mt-5 mb-2"><b>Electromuebles Alexa</b></p>
                      <p><br>Av. Simón Plata Torres <br>calle Esmeraldas</p>
                    </div>
                    <div class="col-lg-3 pr-0">
                      <p class="mt-5 mb-2 text-right"><b>Vendido a</b></p>
                      <p class="text-right">{{$cliente->nombre_completo}},<br> {{$cliente->ciudad}}<br> {{$cliente->canton}}, {{$cliente->direccion}}.</p>
                    </div>
                  </div>
                  <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-3 pl-0">
                      <p class="mb-0 mt-5">Fecha de la venta : {{date('d-m-Y',strtotime($venta->created_at))}}</p>
                      {{-- <p>Due Date : 25th Jan 2017</p> --}}
                    </div>
                  </div>
                  <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                    <div class="table-responsive w-100">
                        <table class="table">
                          <thead>
                            <tr class="bg-dark text-white">
                                <th>#</th>
                                <th>Descripción</th>
                                <th class="text-right">Cantidad</th>
                                <th class="text-right">Costo Unitario</th>
                                <th class="text-right">Total</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($venta->detalles_venta as $key => $detalle_venta)
                            <tr class="text-right">
                              <td class="text-left">{{$key+1}}</td>
                              <td class="text-left">{{$detalle_venta->producto->nombre}}</td>
                              <td>{{$detalle_venta->cantidad}}</td>
                              <td>${{$detalle_venta->precio}}</td>
                              <td>${{$detalle_venta->cantidad*$detalle_venta->precio}}</td>
                            </tr>
                           @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div class="container-fluid mt-5 w-100">
                    @if(isset($entrada))
                    <p class="text-right mb-2">Entrada: ${{$entrada}}</p>
                    @endif
                    <p class="text-right mb-2">Subtotal: ${{$venta->total}}</p>
                   
                    {{-- <p class="text-right">vat (10%) : $138</p> --}}
                    <h4 class="text-right mb-5">Total : ${{$venta->total+$entrada}}</h4>
                    <hr>
                  </div>
                  <div class="container-fluid w-100">
                    <a href="{{route('pdf.ventaPagada',$venta->id)}}" class="btn btn-primary float-right mt-4 ml-2"><i class="fa fa-print mr-1"></i>Imprimir</a>
                    <a href="#" class="btn btn-success float-right mt-4"><i class="fa fa-share mr-1"></i>Enviar factura</a>
                  </div>
              </div>
          </div>
      </div>
</div>
@endsection