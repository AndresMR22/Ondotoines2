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
                    <h1>Reportes</h1>
                    <p class="breadcrumbs"><span><a href="index.html">Dashboard</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Reportes
                    </p>
                </div>
                <div>
                    <a href="" class="btn btn-primary"> Ver Todos
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Generar reporte</h2>
                        </div>

                        <div class="card-body">
                            <div class="row ec-vendor-uploads">

                                <div class="col-lg-12">
                                    <div class="ec-vendor-upload-detail">
                                        <form class="row g-3" action="{{ route('reporte.store') }}" method="POST">
                                            @csrf
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Opción</label>
                                                <select name="opcion" id="opcion" class="form-select @error('opcion') is-invalid @enderror">
                                                    <option value="1">Tratamientos</option>
                                                    <option value="2">Pacientes</option>
                                                </select>
                                                @error('opcion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Fecha Inicio</label>
                                                <input type="datetime-local"  name="fecha_inicio" class="form-control slug-title" id="fecha_inicio">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Fecha Fin</label>
                                                <input type="datetime-local" name="fecha_fin" class="form-control slug-title" id="fecha_fin">
                                            </div>

                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-outline-danger" title="Generar Reporte"><i class="fas fa-file-pdf"></i></button>
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
