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
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Administradores</h1>
                    <p class="breadcrumbs"><span><a href="">Dashboard</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Administradores
                    </p>
                </div>
                <div>
                    <a data-bs-toggle="modal" data-bs-target="#modalCrear" class="btn btn-primary"> Agregar
                        administrador</a>
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
                                            <th>Foto</th>
                                            <th>Correo</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                @if(isset($admin->imagen))
                                                <td><img width="100px;" src="{{$admin->imagen->url}}" alt="img admin"></td>
                                                @else
                                                <td><img alt="img admin"></td>
                                                @endif
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->name }}</td>
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
                                                                data-bs-target="#modalEditar{{ $admin->id }}">Editar</a>
                                                            <a onclick="eliminarPaciente({{ $admin->id }})"
                                                                class="dropdown-item">Eliminar</a>
                                                        </div>
                                                        <form id="formEliminar{{ $admin->id }}" method="POST"
                                                            action="{{ route('administrador.destroy', $admin->id) }}">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- MODAL EDITAR admin --}}
                                            <div class="modal fade modal-add-contact" id="modalEditar{{ $admin->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST"
                                                            action="{{ route('administrador.update', $admin->id) }}" enctype="multipart/form-data">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="modal-header px-4">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Editar
                                                                    Administrador</h5>
                                                            </div>

                                                            <div class="modal-body px-4">
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Nombre</label>
                                                                            <input type="text" class="form-control"
                                                                                name="nombre" id="nombre"
                                                                                value="{{ $admin->name }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Foto actual</label>
                                                                            @if(isset($admin->imagen))
                                                                         <img width="100px;"  src="{{$admin->imagen->url}}">  
                                                                            @else
                                                                            <img src="" alt="imagen por defecto">  
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="firstName">Foto</label>
                                                                                <input type="file" class="form-control"
                                                                                    name="foto" id="foto" required>
                                                                            </div>
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
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Crear Administrador</h5>
                    </div>

                    <div class="modal-body px-4">


                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">Nombre</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                        id="name" autocomplete="name" placeholder="Ingrese el nombre" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">Correo</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" autocomplete="email" name="email" id="email"
                                        placeholder="Ingrese su correo" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">Contraseña</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        minlength="8" autocomplete="current-password" name="password" id="password"
                                        placeholder="Ingrese su contraseña" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">Foto</label>
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                       name="foto" id="foto"
                                        required>
                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
        function eliminarPaciente(id) {
            let form = document.getElementById('formEliminar' + id);
            form.submit();
        }
    </script>


@endsection
