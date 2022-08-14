@extends('admin.dashboard')

@section('contenido')
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
    <div class="page-header">
        <h3 class="page-title">
            Agregar descuento
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Agregar descuento</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <form class="forms-sample" action="{{ route('descuento.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Agregar descuento</h4>
                    <p class="card-description">

                    </p>


                    <div class="form-group">
                        <label for="exampleInputName1">Forma del descuento</label>
                        <select class="form-control" name="opcionDescuento" onchange="opcionFormaDescuento();"
                            id="opcionDescuento">
                            <option selected disabled>Seleccione una opción</option>
                            <option value="1">Agregar descuento a un producto determinado</option>
                            <option value="2">Agregar descuento a una categoría de productos</option>
                        </select>
                    </div>


                    <div class="form-group" id="contenedorCategoria">
                        <label for="exampleInputName1">Especifique la categoría del producto</label>
                        <select class="form-control" name="categoria" onchange="seleccionarCategoria();" id="categoria_id"
                            required>
                            <option selected disabled>Seleccione la categoría del producto</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="container_subcategorias" class="form-group">

                    </div>
                    <div class="container-fade" id="container_fade">
                        <div class="form-group" id="contenedorMarca">
                            <select class="form-control" name="marca" id="" required>
                                <option selected disabled>Seleccione la marca del producto</option>
                                @foreach ($marcas as $key => $marca)
                                    <option value="{{ $marca }}">{{ $marca }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="contenedorModelo">
                            <select class="form-control" name="modelo" id="" required>
                                <option selected disabled>Seleccione el modelo del producto</option>
                                @foreach ($modelos as $modelo)
                                    <option value="{{ $modelo }}">{{ $modelo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Valor del descuento a aplicar (1-50)</label>
                        <input class="form-control" type="number" name="descuento" min="1" max="50">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Fecha limite</label>
                      <input class="form-control" type="datetime-local" name="fin_descuento" min="{{date('Y-m-d\TH:i') }}">
                  </div>

                </div>



                {{-- <div class="form-group">
            <label for="exampleInputEmail3">Imagen</label>
            <input  class="form-control" type="file" name="imagen"  id="imagen">
          </div> --}}



                <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                <button class="btn btn-light">Cancelar</button>
            </form>
        </div>
    </div>
   


    <script>
        var showDiv1 = true;
        var showDiv2 = true;

        function opcionFormaDescuento() {
            let op = document.getElementById('opcionDescuento').value;
            var containerFade = document.getElementById('container_fade');
            console.log(containerFade);
            // if(op=='2')
            if (op == '2')
                containerFade.style = "display:none; visibility:hidden"
            else
                containerFade.style = ""

        }

        var categoria_id_prev = null;

        function cargarSubcategorias(categoria_id) {
            $.ajax({
                url: `{{ url('/admin/subcategorias/categoria/${categoria_id}') }}`,
                dataType: "json",
                data: {},
                success: function(subcategoria) {
                    if (subcategoria.length > 0) {
                        var container = document.getElementById('container_subcategorias');
                        let select = document.createElement("select");
                        select.name = "subcategoria_id";
                        select.className += " form-control selectSubcategorias js-example-basic-single w-100";
                        for (let i = 0; i < subcategoria.length; i++) {
                            let option = document.createElement("option");
                            option.setAttribute("value", subcategoria[i].id);
                            let optionTexto = document.createTextNode(subcategoria[i].nombre);
                            option.appendChild(optionTexto);
                            select.appendChild(option);
                        }
                        categoria_id_prev = categoria_id;
                        container.appendChild(select);
                    } else {
                        document.querySelector('.selectSubcategorias').remove();
                    }

                }
            });
        }

        function seleccionarCategoria() {
            var selectSubcategorias = document.getElementById("container_subcategorias");
            var categoria_id = document.getElementById("categoria_id").value;

            if (categoria_id_prev == null) {
                cargarSubcategorias(categoria_id);
            } else {
                document.querySelector('.selectSubcategorias').remove();
                categoria_id_prev = null;
                cargarSubcategorias(categoria_id);
            }
        }
    </script>
@endsection
