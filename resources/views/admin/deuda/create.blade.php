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
       Asignar deuda a {{$cliente->nombre_completo}}
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Asignar deuda</li>
        </ol>
    </nav>
  </div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Asignar deuda a {{$cliente->nombre_completo}}</h4>
        <p class="card-description">
          
        </p>
        <form class="forms-sample" action="{{route('deuda.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="form-group">
            <label for="exampleInputName1">Cuota</label>
            <input name="cuota" type="number" class="form-control" id="exampleInputName1" placeholder="cuota">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Meses</label>
            <input name="meses" type="number" class="form-control" id="exampleInputName1" placeholder="Meses">
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Saldo por pagar</label>
            <input name="saldo" type="number" class="form-control" id="exampleInputName1" placeholder="Saldo a pagar">
          </div>
         
         <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
       
          <button type="submit" class="btn btn-primary mr-2">Enviar</button>
          <button class="btn btn-light">Cancelar</button>
        </form>
      </div>
    </div>
  </div>

@endsection