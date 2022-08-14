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
      Productos disponibles
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Productos disponibles</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Productos disponibles</h4>
      <div class="botones" style="display:flex; justify-content:center;">
        <a href="{{route('venta.pasarela')}}" class="btn btn-success"><i class="fas fa-money-check"></i></a>

      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                
                    {{-- <th>Imagen</th> --}}
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($productosRestantes as $producto)
                <tr>
                    <td>{{$producto->codigo}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->marca}}</td>
                    <td>{{$producto->modelo}}</td>
                   
                    {{-- <td><img src="{{$categoria->image->url}}" alt="imagen de categoria"></td>
                    --}}
              
                   <td>
                        <form action="{{route('shopping_cart_details.store')}}" id="addcar{{$producto->id}}" method="POST"  class="d-none">
                          @csrf
                          <input type="hidden" name="cantidad" value="1" >
                          <input type="number" name="producto_id" value="{{$producto->id}}">
                        </form>
                        <a onclick="event.preventDefault();
                        document.getElementById('addcar{{$producto->id}}').submit();" class="btn btn-success"><i class="fas fa-plus"></i><i class="fas fa-shopping-cart"></i></a>

                         
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