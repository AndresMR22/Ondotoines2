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



    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Agregar Paciente</h1>
                    <p class="breadcrumbs"><span><a href="index.html">Dashboard</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Paciente
                    </p>
                </div>
                <div>
                    <a href="{{ route('paciente.index') }}" class="btn btn-primary"> Ver Todos
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Agregar Paciente</h2>
                        </div>

                        <div class="card-body">
                            <div class="row ec-vendor-uploads">

                                <div class="col-lg-12">
                                    <div class="ec-vendor-upload-detail">
                                        <form class="row g-3" action="{{ route('paciente.store') }}" method="POST">
                                            @csrf
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Nombre</label>
                                                <input type="text" name="nombre" class="form-control slug-title @error('nombre') is-invalid @enderror"
                                                    value="{{ old('nombre') }}" id="nombre">
                                                    @error('nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Apellido</label>
                                                <input type="text" name="apellido" class="form-control slug-title @error('apellido') is-invalid @enderror"
                                                    value="{{ old('apellido') }}" id="apellido">
                                                    @error('apellido')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Correo</label>
                                                <input type="email" name="correo" class="form-control slug-title @error('correo') is-invalid @enderror"
                                                    value="{{ old('correo') }}" id="correo">
                                                    @error('correo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Lugar de nacimiento</label>
                                                <input type="text" name="lugar_nac" class="form-control slug-title @error('lugar_nac') is-invalid @enderror"
                                                    value="{{ old('lugar_nac') }}" id="lugar_nac">
                                                    @error('lugar_nac')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Ocupación</label>
                                                <input type="text" name="ocupacion" class="form-control slug-title @error('ocupacion') is-invalid @enderror"
                                                    value="{{ old('ocupacion') }}" id="ocupacion">
                                                    @error('ocupacion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Dirección</label>
                                                <input type="text" name="direccion" class="form-control slug-title @error('direccion') is-invalid @enderror"
                                                    value="{{ old('direccion') }}" id="direccion">
                                                    @error('direccion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">cedula</label>
                                                <input type="text" name="cedula" class="form-control slug-title @error('cedula') is-invalid @enderror"
                                                    value="{{ old('cedula') }}" id="cedula">
                                                    @error('cedula')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">telefono</label>
                                                <input type="tel" name="telefono" class="form-control slug-title @error('telefono') is-invalid @enderror"
                                                    value="{{ old('telefono') }}" id="telefono">

                                                    @error('telefono')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">sexo</label>
                                                <select name="sexo" id="sexo" class="form-select @error('sexo') is-invalid @enderror">
                                                    <option value="M">Masculino</option>
                                                    <option value="M">Femenino</option>
                                                </select>
                                                @error('sexo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>


                                            <div class="col-md-6">
                                                <label class="form-label">Fecha de nacimiento</label>
                                                <input type="date" name="fecha_nac" class="form-control @error('fecha_nac') is-invalid @enderror"
                                                    id="fecha_nac" value="{{ old('fecha_nac') }}">
                                                    @error('fecha_nac')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Observación</label>
                                                <textarea name="observacion" class="form-control @error('observacion') is-invalid @enderror"  rows="4">{{ old('observacion') }}</textarea>
                                                @error('observacion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
@endsection
