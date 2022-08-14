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
       Registrar cliente
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registrar cliente</li>
        </ol>
    </nav>
  </div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Registrar nuevo cliente</h4>
        <p class="card-description">
          
        </p>
        <form class="forms-sample" action="{{route('cliente.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nombre completo (Nombres y Apellidos)*</label>
            <input name="nombre_completo" type="text" class="form-control" id="exampleInputName1" placeholder="Nombre completo">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Cedula de identidad*</label>
            <input name="cedula" type="text" class="form-control" id="exampleInputName1" placeholder="Número de cedula de identidad">
          </div>
       
          <div class="form-group">
            <label for="exampleInputName1">Teléfono</label>
            <input name="telefono" type="tel" class="form-control" id="exampleInputName1" placeholder="Número de teléfono">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Correo</label>
            <input name="email" type="email" class="form-control" id="exampleInputName1" placeholder="Correo electrónico">
          </div>


          <div class="form-group">
            <label for="exampleInputName1">Ciudad</label>
            <input name="ciudad" type="text" class="form-control" id="exampleInputName1" placeholder="Nombre de la ciudad ">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Cantón</label>
            <input name="canton" type="text" class="form-control" id="exampleInputName1" placeholder="Nombre del cantón">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Dirección</label>
            <input name="direccion" type="text" class="form-control" id="exampleInputName1" placeholder="Dirección donde reside">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Lugar de trabajo*</label>
            <input name="lugar_trabajo" type="text" class="form-control" id="exampleInputName1" placeholder="Lugar de trabajo">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Cargo</label>
            <input name="cargo" type="text" class="form-control" id="exampleInputName1" placeholder="Nombre del cargo">
          </div>
          {{-- <div class="form-group">
            <label for="exampleInputEmail3">Imagen</label>
            <input  class="form-control" type="file" name="imagen"  id="imagen">
          </div> --}}
         
         
       <div style="display:flex; justify-content:space-evenly;">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a  class="btn btn-info">Guardar y asignar deuda</a>
       </div>
        
        </form>
      </div>
    </div>
  </div>

@endsection