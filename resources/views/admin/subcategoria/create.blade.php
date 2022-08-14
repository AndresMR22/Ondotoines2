@extends('admin.dashboard')

@section('contenido')
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
       Agregar subcategoría
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar subcategoría</li>
        </ol>
    </nav>
  </div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Agregar subcategoría</h4>
        <p class="card-description">
          
        </p>
        <form class="forms-sample" action="{{route('subcategoria.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label>Seleccione una categoría</label>
            <select id="selectcategoria" class="form-control js-example-basic-single w-100" name="categoria_id">
                @foreach ($categorias as $key => $c)
                <option value="{{$c->id}}">{{$c->nombre}}</option>
                @endforeach
            </select>
          </div>


          <div class="form-group">
            <label for="exampleInputName1">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="exampleInputName1" placeholder="nombre">
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
  </div>

@endsection