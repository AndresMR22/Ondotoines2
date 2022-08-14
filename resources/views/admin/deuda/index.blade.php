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
      Deudas
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Deudas</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Deudas</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Cuota</th>
                    <th>Saldo</th>
                    <th>Meses</th>
                    <th>Responsable</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($deudas as $deuda)
                <tr>
                    <td>{{$deuda->cuota}}</td>
                    <td>{{$deuda->saldo}}</td>
                    <td>{{$deuda->meses}}</td> 
                    <td>{{$deuda->cliente->nombre_completo}}<a class="btn btn-primary mx-2" title="Ver más información"><i class="fas fa-info"></i></a></td>             
                   <td>
                     <a href="{{route('abono.abonosByCliente',$deuda->cliente->id)}}" class="btn btn-info" title="Ver abonos"><i class="fas fa-money-check"></i></a>
                    <form method="post" id="deletedeuda{{$deuda->id}}" action="{{url('admin/deuda/'.$deuda->id)}}" class="d-inline">
                      @csrf
                      <a id="botoncol" data-toggle="modal" data-target="#exampleModal2{{ $deuda->id }}" class="btn btn-outline-primary " title ="Editar"><i class="fas fa-edit"></i></a>
                      {{method_field('DELETE')}}
                          <a id="botoncol" onclick="eliminarDeuda({{$deuda}});" class="btn btn-outline-danger" title ="Eliminar"><i class="fas fa-trash"></i></a>
                        </form>
                      </td>
                   
                </tr>


                <div class="modal fade" id="exampleModal2{{ $deuda->id }}" tabindex="-1"
                  role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel-2">Editar deuda</h5>
                              <button type="button" class="close" data-dismiss="modal"
                                  aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">

                              <form method="POST" action="{{route('deuda.update',$deuda->id)}}" enctype = "multipart/form-data">
                                  @csrf
                                  {{method_field('PATCH')}}
                                  <input name="deuda_id" type="hidden" value="{{ $deuda->id }}">
                                  <div class="form-group row">
                                      <label for="exampleInputUsername2"
                                          class="col-sm-3 col-form-label">Cuota</label>
                                      <div class="col-sm-9">
                                          <input name="cuota" type="number"
                                              class="form-control" value="{{$deuda->cuota}}"
                                              >
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">Saldo</label>
                                    <div class="col-sm-9">
                                        <input name="saldo" type="number"
                                            class="form-control" value="{{$deuda->saldo}}"
                                            >
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label for="exampleInputUsername2"
                                      class="col-sm-3 col-form-label">Meses</label>
                                  <div class="col-sm-9">
                                      <input name="meses" type="number"
                                          class="form-control" value="{{$deuda->meses}}"
                                          >
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

function eliminarDeuda(deuda){
  var form = document.getElementById('deletedeuda'+deuda.id);
  swal({
      title: "Estas seguro de eliminar la deuda ?",
      text: "Al confirmar, la deuda será eliminada permanentemente!",
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
        swal("Cancelado", "La deuda no ha sido eliminada", "error");
      }
    })

}
 </script>

@endsection