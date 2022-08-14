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
        <li class="breadcrumb-item active" aria-current="page">Abonos por cliente</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Abonos por cliente</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
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
                 
                    <a href="" class="btn btn-info" title="Ver abonos del cliente {{$cliente->nombre_completo}}"><i class="fas fa-info"></i></a>
                    
                      </td>
                   
                </tr>


               
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