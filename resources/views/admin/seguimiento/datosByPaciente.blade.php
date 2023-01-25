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
    
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">

            <!-- CITAS POR PACIENTE -->

            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-center">
                <div>
                    <h1>Citas</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Medico</th>
                                            <th>Especialidad</th>
                                            <th>Fecha inicio</th>
                                            <th>Fecha fin</th>
                                            <th>Teléfono</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($citas as $cita)
                                            <tr>
                                                <td>{{ $cita->medico }}</td>
                                                <td>{{ $cita->especialidad }}</td>
                                                <td>{{ $cita->fecha_inicio }}</td>
                                                <td>{{ $cita->fecha_fin }}</td>
                                                <td>{{ $cita->telefono }}</td>
                                                <td>{{ $cita->estado }}</td>
                                                <td>
                                                    <div class="btn-group mb-1">
                                                        <button type="button" class="btn btn-outline-success">Info</button>
                                                        <button type="button"
                                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static">
                                                            <span class="sr-only">Info</span>
                                                        </button>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#modalEditarCita{{ $cita->id }}">Editar</a>
                                                            <a class="dropdown-item"
                                                                onclick="eliminarCita({{ $cita->id }});">Eliminar</a>
                                                        </div>
                                                    </div>
                                                    <form id="formEliminarCita{{ $cita->id }}" method="POST"
                                                        action="{{ route('cita.destroy', $cita->id) }}">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade modal-add-contact"
                                                id="modalEditarCita{{ $cita->id }}" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST" id="formEditarCita{{ $cita->id }}"
                                                            action="{{ route('cita.update', $cita->id) }}">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="modal-header px-4">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Editar
                                                                    Cita</h5>
                                                            </div>

                                                            <div class="modal-body px-4">
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Medico</label>
                                                                            <input type="text" class="form-control"
                                                                                name="medico" id="medico"
                                                                                value="{{ $cita->medico }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Especialidad</label>
                                                                            <input type="text" class="form-control"
                                                                                name="especialidad" id="especialidad"
                                                                                value="{{ $cita->especialidad }}" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Estado</label>
                                                                            <select name="estado" id="estado"
                                                                                class="form-select" required>
                                                                                <option value="pendiente"
                                                                                    {{ $cita->estado == 'pendiente' ? 'selected' : '' }}>
                                                                                    Pendiente</option>
                                                                                <option value="atendido"
                                                                                    {{ $cita->estado != 'pendiente' ? 'selected' : '' }}>
                                                                                    Atendido</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Teléfono</label>
                                                                            <input type="tel" class="form-control"
                                                                                name="telefono" required id="telefono"
                                                                                value="{{ $cita->telefono }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Fecha Inicio</label>
                                                                            <input type="datetime-local" required
                                                                                class="form-control" name="fecha_inicio"
                                                                                id="fecha_inicioEditar{{ $cita->id }}"
                                                                                value="{{ $cita->fecha_inicio }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Fecha Fin</label>
                                                                            <input type="datetime-local" required
                                                                                class="form-control" name="fecha_fin"
                                                                                id="fecha_finEditar{{ $cita->id }}"
                                                                                value="{{ $cita->fecha_fin }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer px-4">
                                                                <button type="button" class="btn btn-secondary btn-pill"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <a onclick="guardarCambios({{ $cita->id }});"
                                                                    class="btn btn-primary btn-pill">Guardar cambios</a>
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

            <!-- TRATAMIENTOS POR PACIENTE -->
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-center my-5">
                <div>
                    <h1 class="text-center">Tratamientos</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table2" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Medico</th>
                                            <th>Especialidad</th>
                                            <th>Asunto</th>
                                            <th>Observación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tratamientos as $key => $tra)
                                            <tr>
                                                <td>{{ $tra->medico }}</td>
                                                <td>{{ $tra->especialidad }}</td>
                                                <td>{{ $tra->asunto }}</td>
                                                <td>{{ $tra->observacion }}</td>
                                                <td>
                                                    <div class="btn-group mb-1">
                                                        <button type="button"
                                                            class="btn btn-outline-success">Info</button>
                                                        <button type="button"
                                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static">
                                                            <span class="sr-only">Info</span>
                                                        </button>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#modalProcedimientos{{ $key }}">Procedimientos</a>
                                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#modalEditarTratamiento{{ $tra->id }}">Editar</a>
                                                            <a class="dropdown-item"
                                                                onclick="eliminarTratamiento({{ $tra->id }})">Eliminar</a>
                                                        </div>
                                                    </div>
                                                    <form id="formEliminarTratamiento{{ $tra->id }}" method="POST"
                                                        action="{{ route('tratamiento.destroy', $tra->id) }}">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade modal-add-contact"
                                                id="modalEditarTratamiento{{ $tra->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
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

                                            <div class="modal fade modal-add-contact"
                                                id="modalProcedimientos{{ $key }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-header px-4 d-flex justify-content-between">
                                                            <div>
                                                                <h5 class="modal-title text-center"
                                                                    id="exampleModalCenterTitle">Información del
                                                                    tratamiento</h5>
                                                            </div>
                                                            <div>
                                                                <button type="button" class="btn btn-secondary btn-pill"
                                                                    data-bs-dismiss="modal">X</button>
                                                            </div>
                                                        </div>

                                                        <div class="modal-body px-4">
                                                            <div class="row-100 d-flex flex-direction-row">
                                                                <div class="col-6">
                                                                    <div class="procedimientos text-center">Procedimientos
                                                                    </div>
                                                                    <div class="titulos d-flex justify-content-around ">
                                                                        <div class="titulo">Nombre</div>
                                                                        <div class="titulo">Cantidad</div>
                                                                        <div class="titulo">Precio</div>
                                                                    </div>
                                                                    @foreach ($tra->procedimientos as $clave => $pro)
                                                                        <div
                                                                            class="contenidos d-flex justify-content-around ">
                                                                            <div class="contenido">{{ $pro->nombre }}
                                                                            </div>
                                                                            <div class="contenido">{{ $pro->cantidad }}
                                                                            </div>
                                                                            <div class="contenido">{{ $pro->precio }}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="paciente text-center">Paciente</div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6">Nombres:</div>
                                                                        <div class="col-6">{{ $tra->paciente->nombre }}
                                                                            {{ $tra->paciente->apellido }} </div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6">Cedula:</div>
                                                                        <div class="col-6">{{ $tra->paciente->cedula }}
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6">Ocupación:</div>
                                                                        <div class="col-6">
                                                                            {{ $tra->paciente->ocupacion }}</div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6">Teléfono:</div>
                                                                        <div class="col-6">{{ $tra->paciente->telefono }}
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6">Edad:</div>
                                                                        <div class="col-6">{{ $tra->paciente->edad }}
                                                                            años</div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>


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


    {{-- MODAL CREAR ADMIN --}}
    <div class="modal fade modal-add-contact" id="modalCrear" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Crear Administrador</h5>
                    </div>

                    <div class="modal-body px-4">


                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">Nombre</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">Correo</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer px-4">
                        {{-- <button type="button" class="btn btn-secondary btn-pill"
                                        data-bs-dismiss="modal">Cancelar</button> --}}
                        <button type="submit" class="btn btn-primary btn-pill">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function eliminarTratamiento(id) {
            let form = document.getElementById('formEliminarTratamiento' + id);
            form.submit();
        }

        function eliminarCita(idCita) {
            let form = document.getElementById('formEliminarCita' + idCita);
            form.submit();
        }
    </script>
@endsection
