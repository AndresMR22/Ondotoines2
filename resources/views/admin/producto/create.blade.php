@extends('admin.dashboard')
@section('contenido')

<link rel="stylesheet" href="{{asset('admin/css/createProduct.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/showField.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

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
       Agregar producto
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar producto</li>
        </ol>
    </nav>
  </div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Agregar producto</h4>
        <p class="card-description">
          
        </p>
        
        <form class="forms-sample" action="{{route('producto.store')}}" method="POST" enctype = "multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Seleccione una categoría</label>
            <select id="selectcategoria" onchange="seleccionarCategoria();" class="form-control js-example-basic-single w-100" name="categoria_id">
              <option disabled selected>Categorías</option> 
              @foreach ($categorias as $key => $c)
                <option value="{{$c->id}}">{{$c->nombre}}</option>
                @endforeach
            </select>
          </div>

          <div id="container_subcategorias" class="form-group">
        
          </div>

          <div class="form-group">
            <label for="codigo" id="lblCodigo">Código/Serie</label>
            <input name="codigo" type="text" class="form-control" id="codigo" placeholder="codigo">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Cantidad</label>
            <input name="cantidad" min="1" value="1" type="number" class="form-control" id="exampleInputName1" placeholder="cantidad">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Nombre del articulo</label>
            <input name="nombre" type="text" class="form-control" id="exampleInputName1" placeholder="nombre">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Marca</label>
            <input name="marca" type="text" class="form-control" id="exampleInputName1" placeholder="marca">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Modelo</label>
            <input name="modelo" type="text" class="form-control" id="exampleInputName1" placeholder="modelo">
          </div>

          <div class="my-5" style="display:flex; justify-content: center">
            <a onclick="agregar();" class="btn btn-success" title="Agregar item"><i class="fas fa-plus"></i></a>
          </div>

          <table class="table table-light">
            <thead class="thead-light">
              <tr >
                <th>Imagen del producto </th>
                <th>Color</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody id="tbody">
              <tr>
                <td>
                  <input type="file" name="fotos[]" class="form-control" multiple required>
                </td>
                <td>
                  <input type="color" name="color[]" value="#EFD969" class="form-control color" required>
                </td>
                <td>
                  <a style="visibility:hidden" class="btn btn-danger" title="Eliminar fila"><i class="fas fa-trash"></i></a>
                 </td>
              </tr>
            </tbody>
          </table>
                  
         
          <div class="form-group">
            <label for="exampleInputName1">Precio de costo</label>
            <input name="precio_costo" min="0.01" type="number" class="form-control" step="0.01" id="exampleInputName1" placeholder="precio de costo">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Precio de venta al público (PVP)</label>
            <input name="pvp" min="0.01" type="number" class="form-control" step="0.01" id="exampleInputName1" placeholder="precio de venta al público">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Descripción</label>
            <textarea  class="form-control" name="descripcion" rows="3" placeholder="Añada una descripción para el articulo"></textarea>
          </div>

        
          <div class="form-group">
            <label for="exampleInputEmail3">Imagen del artículo</label>
            <input name="images[]" type="file" class="form-control"  multiple required>
          </div>            
  
          <button type="submit" class="btn btn-primary mr-2">Enviar</button>
          <button class="btn btn-light">Cancelar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
  integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
var categoria_id_prev = null;


function cargarSubcategorias(categoria_id)
{
  $.ajax({
                url:`{{ url('/admin/subcategorias/categoria/${categoria_id}') }}`,
                dataType:"json",
                data: {},
                success:function(subcategoria){
                  if(subcategoria.length > 0){
                    var container = document.getElementById('container_subcategorias');
                  let select = document.createElement("select");
                  select.name="subcategoria_id";
                  select.className+=" form-control selectSubcategorias js-example-basic-single w-100";
                  for(let i = 0 ; i<subcategoria.length ; i++){
   let option = document.createElement("option");
   option.setAttribute("value", subcategoria[i].id);
   let optionTexto = document.createTextNode(subcategoria[i].nombre);
   option.appendChild(optionTexto);
   select.appendChild(option);
                  }
                  categoria_id_prev = categoria_id;
                  container.appendChild(select);
                  }else{
                    document.querySelector('.selectSubcategorias').remove();
                  }
             
    }
  });
}
    function seleccionarCategoria()
    {
     
      var selectSubcategorias = document.getElementById("container_subcategorias");
      var categoria_id = document.getElementById("selectcategoria").value;

      if(categoria_id_prev==null){
cargarSubcategorias(categoria_id);
    
      }else{
        document.querySelector('.selectSubcategorias').remove();
        categoria_id_prev= null;
      cargarSubcategorias(categoria_id);
      }
     
}

  var contadorItemAgregados = 0;
  function agregar()
  {

    if(contadorItemAgregados==4)
    {
      showAviso();
    }

    let tbody = document.getElementById('tbody');
    console.log(tbody)
    // tbody.innerHTML = '';
    let tr = `
      <tr id="fila${contadorItemAgregados}">
        <td>
                  <input type="file" name="fotos[]" class="form-control" multiple required>
                </td>
                <td>
                  <input type="color" name="color[]" value="#EFD969" class="form-control color" required>
                </td>
                <td>
                  <a  onclick="eliminarFila(${contadorItemAgregados});" class="btn btn-danger" title="Eliminar fila"><i class="fas fa-trash"></i></a>
                </td>
        </tr>
    `
    $(tbody).append(tr)
    contadorItemAgregados++;

  }

  function eliminarFila(idFila) 
  {
    let fila = document.getElementById('fila'+idFila);
    $(fila).remove();
    contadorItemAgregados--;
  }

  function showAviso()
  {
    swal({
      title: "Atención",
      text: "No puedes agregar más de 5 filas",
      icon: "info",
      // buttons: [
      //   'No, cancelar!',
      //   'Si, estoy seguro!'
      // ],
      dangerMode: false,
    })
  }

</script>

@endsection