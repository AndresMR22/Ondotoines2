@extends('admin.dashboard')
@section('contenido')
    @if (Session::has('mensaje'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" role="alert">
                <span aria-button="true">&times;</span>
            </button>
        </div>
    @endif

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


    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
                <h1>Tratamientos</h1>
                <p class="breadcrumbs"><span><a href="index.html">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Tratamientos
                </p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Asunto</th>
                                            <th>Especialidad</th>
                                            <th>Medico</th>
                                            <th>Paciente</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($tratamientos as $key => $tra)
                                            <tr>
                                                <td>{{ $tra->asunto }}</td>
                                                <td>{{ $tra->especialidad }}</td>
                                                <td>{{ $tra->medico }}</td>
                                                <td>{{ $tra->paciente->nombre }}</td>
                                                <td>
                                                    <div class="btn-group mb-1">
                                                        <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#modalProcedimientos{{ $key }}"
                                                            class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                    <div class="btn-group mb-1">
                                                        <a type="button" class="btn btn-outline-warning"
                                                             href="{{route('tratamiento.edit', $tra->id)}}"
                                                            ><i class="fas fa-edit"></i></a>
                                                    </div>
                                                    <div class="btn-group mb-1">
                                                        <a onclick="eliminarTratamiento({{ $tra->id }})"
                                                            class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                    <form id="formEliminar{{ $tra->id }}" method="POST"
                                                        action="{{ route('tratamiento.destroy', $tra->id) }}">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade modal-add-contact"
                                                id="modalProcedimientos{{ $key }}" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-header px-4 d-flex justify-content-between">
                                                            <div>
                                                                <h5 class="modal-title text-center"
                                                                    id="exampleModalCenterTitle">Información del tratamiento
                                                                </h5>
                                                            </div>
                                                            <div>
                                                                <button type="button" class="btn btn-secondary btn-pill"
                                                                    data-bs-dismiss="modal">X</button>
                                                            </div>
                                                        </div>

                                                        <div class="modal-body px-4">
                                                            <div class="row-100 d-flex flex-direction-row">
                                                                <div class="col-6 mx-2"
                                                                    style="border: dashed black; border-radius:30px;">
                                                                    <div class="procedimientos text-center">Procedimientos
                                                                    </div>
                                                                    <div class="titulos d-flex justify-content-around ">
                                                                        <div class="titulo">Nombre</div>
                                                                        <div class="titulo">Cantidad</div>
                                                                        <div class="titulo">Precio</div>
                                                                    </div>
                                                                    @foreach ($tra->procedimientos as $clave => $pro)
                                                                        <div
                                                                            class="contenidos d-flex justify-content-around">
                                                                            <div class="contenido">{{ $pro->nombre }}
                                                                            </div>
                                                                            <div class="contenido">{{ $pro->cantidad }}
                                                                            </div>
                                                                            <div class="contenido">{{ $pro->precio }}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="col-6 mx-2"
                                                                    style="border: dashed black; border-radius:30px;">
                                                                    <div class="paciente text-center">Paciente</div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6" style="text-align: right">
                                                                            Nombres:</div>
                                                                        <div class="col-6 " style="text-align: left">
                                                                            {{ $tra->paciente->nombre }}
                                                                            {{ $tra->paciente->apellido }} </div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6" style="text-align: right">
                                                                            Cedula:</div>
                                                                        <div class="col-6" style="text-align: left">
                                                                            {{ $tra->paciente->cedula }}</div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6" style="text-align: right">
                                                                            Ocupación:</div>
                                                                        <div class="col-6" style="text-align: left">
                                                                            {{ $tra->paciente->ocupacion }}</div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6" style="text-align: right">
                                                                            Teléfono:</div>
                                                                        <div class="col-6" style="text-align: left">
                                                                            {{ $tra->paciente->telefono }}</div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6" style="text-align: right">Edad:
                                                                        </div>
                                                                        <div class="col-6" style="text-align: left">
                                                                            {{ $tra->paciente->edad }} años</div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                            {{-- MODAL EDITAR TRATAMIENTO --}}
                                            <div class="modal fade modal-add-contact" id="modalEditar{{ $tra->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST"
                                                            action="{{ route('tratamiento.update', $tra->id) }}">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="modal-header px-4">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                    Editar Tratamiento</h5>
                                                            </div>

                                                            <div class="modal-body px-4">
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Asunto</label>
                                                                            <input type="text" class="form-control"
                                                                                name="asunto" id="asunto"
                                                                                value="{{ $tra->asunto }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Medico</label>
                                                                            <input type="text" class="form-control"
                                                                                name="medico" id="medico"
                                                                                value="{{ $tra->medico }}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-2">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Especialidad</label>
                                                                            <input type="text" class="form-control"
                                                                                name="especialidad" id="especialidad"
                                                                                value="{{ $tra->especialidad }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Observación</label>
                                                                            <textarea class="form-control" name="observacion">{{ $tra->observacion }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <style>
                                                                    .tratamientos
                                                                    {
                                                                        display: flex;
                                                                        justify-content: center;
                                                                        flex-direction: column;
                                                                        align-items: center;
                                                                    }
                                                                
                                                                    .contenidoTratamientos
                                                                    {
                                                                        display:flex;
                                                                        justify-content: space-around;
                                                                        gap:20px;
                                                                    }
                                                                    .cabecera
                                                                    {
                                                                        text-align: center;
                                                                    }

                                                                    .datos
                                                                    {
                                                                        text-align: center;
                                                                    }

                                                                    

                                                                    /* .listadoNombres
                                                                    {
                                                                        display: flex;
                                                                        justify-content: center;
                                                                    }

                                                                    .listadoPrecios
                                                                    {
                                                                        display: flex;
                                                                        justify-content: center;
                                                                    } */

                                                                </style>
                                                                <div class="tratamientos my-3">

                                                                   

                                                                    <div class="titulo " style="font-weight:bold; color:black;">TRATAMIENTOS</div>
                                                                    <div class="row" style="border: dashed black; border-radius:30px;">
                                                                        <div class="col-3" >
                                                                            <div class="cabecera">Nombre</div>
                                                                        </div>
                                                                        <div class="col-3" >
                                                                            <div class="cabecera">Cantidad</div>
                                                                        </div>
                                                                        <div class="col-3" >
                                                                            <div class="cabecera ">Precio</div>
                                                                        </div>
                                                                        <div class="col-3" >
                                                                            <div class="cabecera">Total</div>
                                                                        </div>
                                                                    </div>

                                                                    {{-- <div class="row" style="border: dashed black; border-radius:30px;">
                                                                                <div class="col-md-4" >
                                                                                    <input class="form-control datos mb-1" id="nombrePro{{$kn}}" type="text" name="nombre"  value="{{$procedimiento->nombre}}" readonly>
                                                                                </div>

                                                                                <div class="col-md-4" >
                                                                                    <input class="form-control datos mb-1 cantidad" id="cant{{$procedimiento->id}}" onchange="calcularTotal({{$procedimiento->id}});" type="number" name="cantidad">
                                                                                </div>

                                                                                <div class="col-md-4" >
                                                                                    <input class="form-control datos mb-1" id="pre{{$kp}}" type="number" name="precio" value="{{$procedimiento->precio}}" readonly>
                                                                                </div>
                                                                            
                                                                                <div class="col-md-4" >
                                                                                    <input class="form-control datos mb-1" type="number" id="tot{{$kt}}" name="total" value="{{$procedimiento->precioPorCantidad}}" readonly>
                                                                                </div>
                                                                    </div> --}}

                                                                 
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer px-4">
                                                                <button type="button" class="btn btn-secondary btn-pill"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-pill">Guardar
                                                                    cambios</button>
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
        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->

    <script>

        function obtener(e)
        {
            console.log(e.target.value)
        }

        addEventListener('DOMContentLoaded', function()
        {
             document.querySelectorAll('.cantidad').forEach(item =>{
                item.addEventListener('onchange',obtener)
            })
            // for(let i = 0; i<cantidades.length; i++)
            // {
            //     console.log(cantidades[i])
            // }
        });

        function eliminarTratamiento(id) {
            let form = document.getElementById('formEliminar' + id);
            form.submit();
        }

        function calcularTotal(fila)
        {
           
            let cantidad = document.getElementById('cant'+fila).value
            alert(cantidad)
        }
    </script>
@endsection
