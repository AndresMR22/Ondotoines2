@extends('admin.dashboard')

@section('contenido')

<link rel="stylesheet" href="{{asset('admin/css/showField.css')}}">

<div class="page-header">
    <h3 class="page-title">
        Productos
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Productos</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Productos</h4>
      {{-- <div class="filtro" style=" margin-left:-10px; display:flex; justify-content:center; max-width:250px;">
        <form id="formFiltrarProductos" action="{{route('productos.filtrar2')}}" method="POST" class="d-inline">
          @csrf
          <select id="filtro" class="js-example-basic-single w-100 my-3" onchange="filtrar();" name="cantidad">
            <option selected disable>Filtrar por cantidad</option>
            <option value="1">1</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="1000">Todos</option>
        </select>
        </form>
     
      </div> --}}
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Código/Serie</th>
                    <th>Cantidad</th>
                    <th>Articulo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Categoría</th>
                    <th>P.Costo</th>
                    <th>PVP</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($productos as $producto)
                <tr>
                    <td>{{$producto->codigo}}</td>
                    <td>{{floatval($producto->cantidad)}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->marca}}</td>
                    <td>{{$producto->modelo}}</td>
                    <td>
                      <select class="form-control">
                        <option selected disabled>Ver</option>
                        @foreach($producto->colores as $color)
                        <option style="background-color:{{$color->codigo}}" title="{{$color->codigo}}">
                      </option>
                        @endforeach
                      </select>
                    </td>
                    <td>{{$producto->categoria->nombre}}</td>
                    <td>{{$producto->productoprecio->precio_costo}}</td>
                    <td>{{$producto->productoprecio->pvp}}</td>
                    <td>${{$producto->cantidad*$producto->productoprecio->precio_costo}}</td>
                    <td>
                      <a data-toggle="modal" data-target="#exampleModal{{$producto->id}}" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                        <a id="botoncol" class="btn btn-outline-primary"  data-toggle="modal" data-target="#exampleModal2{{ $producto->id }}"><i class="fas fa-edit"></i></a>
            
                        <form method="post" id="deleteproducto" action="{{url('admin/producto/'.$producto->id)}}" class="d-inline" >
                          @csrf
                          {{method_field('DELETE')}}
                          <button type="submit"  onclick="if(!confirm('Está seguro que desea eliminar el registro?'))return false;" id="botoncol" class="btn btn-outline-danger" ><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>

                <div  class="modal fade" id="exampleModal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" >
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Imagen del producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="d-flex justify-content-center">
                      
                        @if(isset($producto->images))
                        @foreach($producto->images as $imagen)
  <img  style="max-width:200px;" src="{{$imagen->url}}" alt="imagen del producto">
                        @endforeach
                        @else
                        <p>No hay imágenes disponibles para este producto</p>
                        @endif
                      </div>
                     
                    </div>
                  </div>
                </div>



                {{-- MODAL PARA EDITAR PRODUCTO  --}}
                <div class="modal fade" id="exampleModal2{{ $producto->id }}" tabindex="-1"
                  role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel-2">Editar producto</h5>
                              <button type="button" class="close" data-dismiss="modal"
                                  aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">

                              <form method="POST" action="{{route('producto.update',$producto->id)}}" enctype = "multipart/form-data">
                                  @csrf
                                  {{method_field('PATCH')}}
                                  <input name="producto_id" type="hidden" value="{{ $producto->id }}">

                                   
                                  <div class="form-group row">
                                    <label for="exampleInputUsername2" id="lblCodigo"
                                        class="col-sm-3 col-form-label">Código</label>
                                    <div class="col-sm-9">
                                        <input name="codigo" id="codigo" type="text"
                                            value="{{ $producto->codigo}}"
                                            class="form-control" id="exampleInputUsername2">
                                    </div>
                                </div>
                             
                              <div class="form-group row">
                                <label for="exampleInputUsername2"
                                    class="col-sm-3 col-form-label">Categoría</label>
                                <div class="col-sm-9">
                                   <select id="selectcategoria" class="form-control" name="categoria_id">
                                     @foreach($categorias as $categoria)
                                     <option value="{{$categoria->id}}" {{old('categoria_id',$producto->categoria_id)== $categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>
                                     @endforeach
                                   </select>
                                </div>
                            </div>
                                  <div class="form-group row">
                                      <label for="exampleInputUsername2"
                                          class="col-sm-3 col-form-label">Articulo</label>
                                      <div class="col-sm-9">
                                          <input name="nombre" type="text"
                                              value="{{ $producto->nombre }}" class="form-control"
                                              id="exampleInputUsername2">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="exampleInputUsername2"
                                          class="col-sm-3 col-form-label">Cantidad</label>
                                      <div class="col-sm-9">
                                          <input name="cantidad" type="number"
                                              value="{{ $producto->cantidad}}"
                                              class="form-control" id="exampleInputUsername2">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="exampleInputUsername2"
                                          class="col-sm-3 col-form-label">Marca</label>
                                      <div class="col-sm-9">
                                          <input name="marca" type="text"
                                              value="{{ $producto->marca}}" class="form-control"
                                              id="exampleInputUsername2">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="exampleInputUsername2"
                                          class="col-sm-3 col-form-label">Modelo</label>
                                      <div class="col-sm-9">
                                          <input name="modelo" type="text"
                                              value="{{ $producto->modelo }}"
                                              class="form-control" id="exampleInputUsername2">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="exampleInputUsername2"
                                          class="col-sm-3 col-form-label">Color</label>
                                      <div class="col-sm-9">
                                          <input name="color" type="color"
                                              value="{{ $producto->color }}" class="form-control"
                                              id="exampleInputUsername2">
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="exampleInputUsername2"
                                          class="col-sm-3 col-form-label">Precio Costo</label>
                                      <div class="col-sm-9">
                                          <input name="precio_costo" type="text"
                                               class="form-control" value="{{$producto->precio_costo}}"
                                              id="exampleInputUsername2">
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="exampleInputUsername2"
                                        class="col-sm-3 col-form-label">PVP</label>
                                    <div class="col-sm-9">
                                        <input name="pvp" type="text"
                                             class="form-control" value="{{$producto->pvp}}"
                                            id="exampleInputUsername2">
                                    </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInputUsername2"
                                      class="col-sm-3 col-form-label">Descripción</label>
                                  <div class="col-sm-9">
                                    <textarea name="descripcion" rows="3">Añada una descripción para el articulo</textarea>
                                  </div>
                              </div>

                                <div class="d-flex justify-content-center">
                      
                                  @if(isset($producto->images))
                                  @foreach($producto->images as $imagen)
                                  <a title="retirar imagen" class="fas fa-times" style="color:red;"  href="{{route('cliente.retirarImagen',$imagen->id)}}"></a>
                                    <img  style="max-width:200px;" src="{{$imagen->url}}" alt="imagen del producto">
                                  @endforeach
                                  
                                  @else
                                <p>No hay imágenes disponibles para este producto</p>
                                  @endif
                                </div>  
                                
                                <div class="form-group row mt-5">
                                  <label for="exampleInputEmail3">Nuevas imágenes para este artículo</label>
                                  <input name="images[]" type="file" class="form-control" id="images" multiple>
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

{{-- {{$productos->links()}} --}}
              </tbody>
              
            </table>
           
          </div>
          {{-- {{$productos->links()}} --}}
        </div>
      </div>
    </div>
  </div>


 <script>


// function seleccionarCategoria()
//     {
//       inputCodigo = document.getElementById('codigo');
//          inputSerie = document.getElementById('serie');
    
//         let opcion = document.getElementById('selectcategoria');
//       let opciontext = opcion.options[opcion.selectedIndex].text;
      
//      if(opciontext==="Muebles"){// aparece codigo , desaparece serie
//         inputCodigo.classList.remove('hidden'); //mostramos campo codigo
//         lblCodigo.classList.remove('hidden'); //mostramos lbl codigo
//         inputSerie.className+=" hidden";
//         lblSerie.classList+=" hidden";
//      }else{ // sino es muebles, entonces
//         inputSerie.classList.remove('hidden'); //mostramos campo serie
//         lblSerie.classList.remove('hidden');
//         inputCodigo.className+=" hidden";
//         lblCodigo.classList+=" hidden";
//      }
//     }
    
// document.addEventListener('DOMContentLoaded', e => {
//     var inputSerie = document.getElementById('serie');
//     var lblSerie = document.getElementById('lblSerie');
//         inputSerie.className+=" hidden";
//         lblSerie.className+=" hidden";
//     });


// function eliminarProducto(producto){
//   var form = document.getElementById('deleteproducto'+producto.id);
//   swal({
//       title: "Estas seguro que quieres eliminar el producto "+producto.nombre+" ?",
//       text: "Al confirmar, el producto será eliminado permanentemente!",
//       icon: "warning",
//       buttons: [
//         'No, cancelar!',
//         'Yes, estoy seguro!'
//       ],
//       dangerMode: true,
//     }).then(function(isConfirm) {
//       if (isConfirm) {
       
//           form.submit(); // <--- submit form programmatically
      
//       } else {
//         swal("Cancelado", "El producto no ha sido eliminado", "error");
//       }
//     })

// }

// function filtrar(){
//     var opcion = document.getElementById("filtro");
//     var form = document.getElementById('formFiltrarProductos');
//     form.submit();
//   }

</script>
@endsection