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

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Notificaciones</h1>
							<p class="breadcrumbs"><span><a href="">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Notificaciones</p>
						</div>
						{{-- <div>
							<a href="{{route('paciente.create')}}" class="btn btn-primary"> Agregar paciente</a>
						</div> --}}
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table"
											style="width:100%">
											<thead>
												<tr>
													<th>Nombres</th>
													<th>Correo</th>
													<th>Teléfono</th>
													<th>Asunto</th>
													<th>Mensaje</th>
													<th>Hora</th>
												</tr>
											</thead>

                                            {{-- "cita_id",
        "nombre",
        "email",
        "telefono",
        "asunto",
        "mensaje",
        "notificado",
        "hora",
        "horasFaltantes" --}}
											<tbody>
                                                @foreach($notificaciones as $notificacion)
												<tr>
													<td>{{$notificacion->nombre}}</td>
													<td>{{$notificacion->email}}</td>
													<td>{{$notificacion->telefono}}</td>
													<td>{{$notificacion->asunto}}</td>
													<td>{{$notificacion->mensaje}}</td>
                                                    <td>{{$notificacion->hora}}</td>
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
																{{-- <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditar{{$notificacion->id}}" >Editar</a> --}}
																<a onclick="eliminarNotificacion({{$notificacion->id}})" class="dropdown-item" >Eliminar</a>
															</div>
                                                            <form id="formEliminar{{$notificacion->id}}" method="POST" action="{{route('cita.eliminarNotificacion',$notificacion->id)}}">
                                                                @csrf
                                                                {{method_field('DELETE')}}
                                                            </form>
														</div>
													</td>
												</tr>

                                                {{-- MODAL EDITAR PACIENTE --}}
            {{-- <div class="modal fade modal-add-contact" id="modalEditar{{$paciente->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{route('paciente.update',$paciente->id)}}">
                            @method('PATCH')
                            @csrf
                            <div class="modal-header px-4">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Editar Paciente</h5>
                            </div>

                            <div class="modal-body px-4">

                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="firstName">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$paciente->nombre}}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lastName">Apellido</label>
                                            <input type="text" class="form-control" name="apellido" id="apellido" value="{{$paciente->apellido}}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="userName">Edad</label>
                                            <input type="number" class="form-control" name="edad" id="edad"
                                                value="{{$paciente->edad}}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="email">Teléfono</label>
                                            <input type="tel" class="form-control" name="telefono" id="telefono"
                                                value="{{$paciente->telefono}}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="Birthday">Sexo</label>
                                            <input type="text" class="form-control" name="sexo" id="sexo"
                                                value="{{$paciente->sexo}}" required>
                                        </div>
                                    </div>

                                   
                                </div>
                            </div>

                            <div class="modal-footer px-4">
                                <button type="button" class="btn btn-secondary btn-pill"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary btn-pill">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}

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
            function eliminarNotificacion(id)
            {
                let form = document.getElementById('formEliminar'+id);
                    form.submit();
            }
            </script>
           
            
@endsection


		