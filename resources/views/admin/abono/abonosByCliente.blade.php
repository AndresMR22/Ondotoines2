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
      Abonos por cliente
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Abonos por cliente</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"> Abonos por cliente</h4>
      <div class="botones" style="display:flex; justify-content:center">
          <a data-toggle="modal" data-target="#exampleModal4" class="btn btn-outline-success">Agregar nuevo Abono <i class="fas fa-plus"></i></a>
      </div>
      <div class="saldo" style="display:flex; justify-content:space-end">
        <h5>Saldo pendiente:${{$saldo}} USD</h5>
    </div>
  
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Monto (USD)</th>
                    <th>Fecha del pago</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($abonos as $key => $abono)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$abono->valor}}</td>
                    <td>{{$abono->created_at}}</td>
                    <td><img src="{{$abono->imagen->url}}" alt="imagen del abono"></td>
                   <td>
                    {{-- <form method="post" id="deleteabono{{$abono->id}}" action="{{url('admin/categoria/'.$abono->id)}}" class="d-inline">
                      @csrf --}}
                      <a id="botoncol" data-toggle="modal" data-target="#exampleModal2{{ $abono->id }}" class="btn btn-outline-primary " title ="Editar"><i class="fas fa-edit"></i></a>
                      {{-- {{method_field('DELETE')}} --}}
                          {{-- <a id="botoncol" onclick="eliminarAbono({{$abono}});" class="btn btn-outline-danger" title ="Eliminar"><i class="fas fa-trash"></i></a> --}}
                       
                          <a id="botoncol"  data-toggle="modal" data-target="#exampleModal3{{ $abono->id }}" class="btn btn-outline-primary " title ="Ver imagen del abono"><i class="fas fa-eye"></i></a>
                        {{-- </form> --}}
                      </td>
                   
                </tr>

                {{-- EDITAR ABONO MODAL --}}
                <div class="modal fade" id="exampleModal2{{ $abono->id }}" tabindex="-1"
                  role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel-2">Editar abono</h5>
                              <button type="button" class="close" data-dismiss="modal"
                                  aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">

                              <form method="POST" action="{{route('abono.update',$abono->id)}}" enctype = "multipart/form-data">
                                  @csrf
                                  {{method_field('PATCH')}}
                                  <input name="abono_id" type="hidden" value="{{ $abono->id }}">
                                  <input name="deuda_id" type="hidden" value="{{ $abono->deuda_id }}">
                                  <div class="form-group row">
                                      <label for="exampleInputUsername2"
                                          class="col-sm-3 col-form-label">Monto</label>
                                      <div class="col-sm-9">
                                          <input name="valor" min="0" type="number"
                                              value="{{ $abono->valor }}" class="form-control"
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
                {{-- VER ABONO MODAL --}}
              <div class="modal fade" id="exampleModal3{{ $abono->id }}" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel-3">Ver imagen del abono</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="display:flex; justify-content: center">
                                <div class="form-group row" style="display:flex; justify-content: center">
                                    <div  style="display:flex; justify-content: center">
                                       <img style="max-width:300px;" src="{{$abono->imagen->url}}">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
                 
@endforeach


{{-- AGREGAR ABONO MODAL --}}
<div class="modal fade" id="exampleModal4" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-4">Agregar abono</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{route('abono.store')}}" enctype = "multipart/form-data">
                    @csrf
                    <input name="deuda_id" type="hidden" value="{{ $abono->deuda_id}}">
                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Monto (USD)</label>
                        <div class="col-sm-9">
                            <input name="valor" min="0" type="number"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Imagen del abono</label>
                        <div class="col-sm-9">
                            <input name="imagen" accept="image/*" type="file"
                                class="form-control">
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


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

 <script>

function eliminarAbono(categoria){
  var form = document.getElementById('deleteabono'+categoria.id);
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