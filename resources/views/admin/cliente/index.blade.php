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
      Clientes
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Clientes</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Lugar de trabajo</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->nombre_completo}}</td>
                    <td>{{$cliente->cedula}}</td>
                    <td>{{$cliente->telefono}}</td>
                    <td>{{$cliente->user->email}}</td>
                    <td>{{$cliente->lugar_trabajo}}</td>
                   <td>
                    <form method="post" id="deletecliente{{$cliente->id}}" action="{{url('admin/cliente/'.$cliente->id)}}" class="d-inline">
                      @csrf
                      <a id="botoncol" data-toggle="modal" data-target="#exampleModal2{{ $cliente->id }}" class="btn btn-outline-primary " title ="Editar"><i class="fas fa-edit"></i></a>
                      {{method_field('DELETE')}}
                          <a id="botoncol" onclick="eliminarCliente({{$cliente}});" class="btn btn-outline-danger" title ="Eliminar"><i class="fas fa-trash"></i></a>
                        </form>
                        <a href="{{route('deuda.asignarDeuda',$cliente->id)}}" class="btn btn-warning" title="Asignar deuda"><i class="fas fa-plus"></i></a>
                      </td>
                   
                </tr>


                <div class="modal fade" id="exampleModal2{{ $cliente->id }}" tabindex="-1"
                  role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel-2">Editar cliente</h5>
                              <button type="button" class="close" data-dismiss="modal"
                                  aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">

                              <form method="POST" action="{{route('cliente.update',$cliente->id)}}" enctype = "multipart/form-data">
                                  @csrf
                                  {{method_field('PATCH')}}
                                  <input name="cliente_id" type="hidden" value="{{ $cliente->id }}">
                                  <div class="form-group row">
                                      <label for="exampleInputUsername2"
                                          class="col-sm-3 col-form-label">Nombre Completo</label>
                                      <div class="col-sm-9">
                                          <input name="nombre_completo" type="text"
                                              value="{{ $cliente->nombre_completo }}" class="form-control"
                                              id="exampleInputUsername2">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Cedula</label>
                                    <div class="col-sm-9">
                                        <input name="cedula" type="text"
                                            value="{{$cliente->cedula}}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Teléfono</label>
                                    <div class="col-sm-9">
                                        <input name="telefono" type="text"
                                            value="{{$cliente->telefono}}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Lugar de trabajo</label>
                                    <div class="col-sm-9">
                                        <input name="lugar_trabajo" type="text"
                                            value="{{$cliente->lugar_trabajo}}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Ciudad</label>
                                    <div class="col-sm-9">
                                        <input name="ciudad" type="text"
                                            value="{{$cliente->ciudad}}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Cantón</label>
                                    <div class="col-sm-9">
                                        <input name="canton" type="text"
                                            value="{{$cliente->canton}}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Dirección</label>
                                    <div class="col-sm-9">
                                        <input name="direccion" type="text"
                                            value="{{$cliente->direccion}}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Cargo</label>
                                    <div class="col-sm-9">
                                        <input name="cargo" type="text"
                                            value="{{$cliente->cargo}}" class="form-control"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-success">Guardar cambios</button>
                              <button type="button" class="btn btn-light"
                                  data-dismiss="modal">Cancelar</button>
                          </div>
                          </form>
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

function eliminarCliente(cliente){
  var form = document.getElementById('deletecliente'+cliente.id);
  swal({
      title: "Estas seguro de eliminar al cliente "+cliente.nombre_completo+" ?",
      text: "Al confirmar, el cliente será eliminado permanentemente!",
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
        swal("Cancelado", "El cliente ha sido eliminado", "error");
      }
    })

}
 </script>

@endsection