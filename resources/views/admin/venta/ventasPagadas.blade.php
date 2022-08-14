@extends('admin.dashboard')

@section('contenido')
     @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" role="alert">
                    <span aria-button="true">&times;</span>
                </button>
            </div>
        @endif
          @if(count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
<div class="page-header">
    <h3 class="page-title">
      Ventas pagadas
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ventas pagadas</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Ventas pagadas</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Fecha de la venta</th>
                    <th>Monto de la venta</th>
                    <th>Cliente</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($ventasPagadas as $venta)
                <tr>
                    <td>{{$venta->created_at}}</td>
                    <td>{{$venta->total}}</td>
                    <td>{{$venta->cliente->nombre_completo}}</td>
                     <td>{{$venta->cliente->telefono}}</td>
                   <td>
                    <form method="post" id="deletecategoria{{$venta->id}}" action="{{url('admin/categoria/'.$venta->id)}}" class="d-inline">
                      @csrf
                      <a id="botoncol" data-toggle="modal" data-target="#exampleModal2{{ $venta->id }}" class="btn btn-outline-info " title ="Ver más datos"><i class="fas fa-eye"></i></a>
                      {{method_field('DELETE')}}
                          <a id="botoncol" onclick="eliminarCategoria({{$venta}});" class="btn btn-outline-danger" title ="Eliminar"><i class="fas fa-trash"></i></a>
                       
                          <a href="{{route('venta.detalleVentaPagada',$venta->id)}}" id="botoncol" class="btn btn-outline-primary " title ="Ver detalles de la venta"><i class="fas fa-cart-plus"></i></a>
                        </form>
                      </td>
                   
                </tr>


                <div class="modal fade" id="exampleModal2{{ $venta->id }}" tabindex="-1"
                  role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel-2">Datos del cliente</h5>
                              <button type="button" class="close" data-dismiss="modal"
                                  aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                                  <div class="form-group row">
                                      <label for="exampleInputUsername2"
                                          class="col-sm-3 col-form-label">Correo electrónico</label>
                                      <div class="col-sm-9">
                                          <input name="correo" type="text"
                                              value="{{$venta->cliente->user->email}}" class="form-control"
                                              id="exampleInputUsername2" disabled>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Cargo</label>
                                    <div class="col-sm-9">
                                        <input name="cargo" type="text"
                                            value="{{$venta->cliente->cargo}}" class="form-control"
                                            id="exampleInputUsername2" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Lugar de trabajo</label>
                                    <div class="col-sm-9">
                                        <input name="correo" type="text"
                                            value="{{$venta->cliente->lugar_trabajo}}" class="form-control"
                                            id="exampleInputUsername2" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Ciudad</label>
                                    <div class="col-sm-9">
                                        <input name="correo" type="text"
                                            value="{{$venta->cliente->ciudad}}" class="form-control"
                                            id="exampleInputUsername2" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Dirección</label>
                                    <div class="col-sm-9">
                                        <input name="correo" type="text"
                                            value="{{$venta->cliente->direccion}}" class="form-control"
                                            id="exampleInputUsername2" disabled>
                                    </div>
                                </div>
                          </div>
                      </div>
                  </div>
              </div>
@endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

 <script>

function eliminarCategoria(categoria){
  var form = document.getElementById('deletecategoria'+categoria.id);
  swal({
      title: "Estas seguro de eliminar la categoria "+categoria.nombre+" ?",
      text: "Al confirmar, la categoría será eliminada permanentemente!",
      icon: "warning",
      buttons: [
        'No, cancelar!',
        'Si, estoy seguro!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
       
          form.submit(); // <--- submit form programmatically
      
      } else {
        swal("Cancelado", "Tu categoría no ha sido eliminada", "error");
      }
    })

}
 </script>

@endsection