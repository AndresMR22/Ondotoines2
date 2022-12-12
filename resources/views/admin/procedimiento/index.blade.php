@extends('admin.dashboard')
@section('contenido')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Procedimientos</h1>
                    <p class="breadcrumbs"><span><a href="">Dashboard</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Procedimientos
                    </p>
                </div>
                <div>
                    <a href="{{ route('procedimiento.create') }}" class="btn btn-primary"> Agregar procedimiento</a>
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
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($procedimientos as $pro)
                                            <tr>
                                                <td><img class="tbl-thumb" src="assets/img/products/p1.jpg"
                                                        alt="Product Image" /></td>
                                                <td>{{ $pro->nombre }}</td>
                                                <td>{{ $pro->precio }}</td>
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
                                                                data-bs-target="#modalEditar{{ $pro->id }}">Editar</a>
                                                            <a onclick="eliminarProcedimiento({{ $pro->id }})"
                                                                class="dropdown-item">Eliminar</a>
                                                        </div>
                                                        <form id="formEliminar{{ $pro->id }}" method="POST"
                                                            action="{{ route('procedimiento.destroy', $pro->id) }}">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- MODAL EDITAR PROCEDIMIENTO --}}
                                            <div class="modal fade modal-add-contact" id="modalEditar{{ $pro->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST"
                                                            action="{{ route('procedimiento.update', $pro->id) }}">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="modal-header px-4">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Editar
                                                                    Procedimiento</h5>
                                                            </div>

                                                            <div class="modal-body px-4">

                                                                <div class="row mb-2">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Nombre</label>
                                                                            <input type="text" class="form-control"
                                                                                name="nombre" id="nombre"
                                                                                value="{{ $pro->nombre }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="lastName">Precio</label>
                                                                            <input type="number" class="form-control"
                                                                                name="precio" id="precio"
                                                                                value="{{ $pro->precio }}">
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

    <script>
        function eliminarProcedimiento(id) {
            let form = document.getElementById('formEliminar' + id);
            form.submit();
        }
    </script>
@endsection
