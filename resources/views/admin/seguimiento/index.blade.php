@extends('admin.dashboard')
@section('contenido')
			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Seguimiento</h1>
							<p class="breadcrumbs"><span><a href="">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Seguimiento</p>
						</div>
						{{-- <div>
							<a data-bs-toggle="modal" data-bs-target="#modalCrear" class="btn btn-primary"> Agregar administrador</a>
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
                                                    {{-- nombre
                                                    apellido
                                                    edad
                                                    lugar_nac
                                                    ocupacion
                                                    direccion
                                                    cedula
                                                    telefono
                                                    sexo
                                                    observacion --}}
													<th>Nombre</th>
													<th>Telefono</th>
                                                    <th>Dirección</th>
                                                    <th>Sexo</th>
													<th>Acciones</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach($pacientes as $paciente)
												<tr>
													<td>{{$paciente->nombre}} {{$paciente->apellido}}</td>
													<td>{{$paciente->telefono}}</td>
                                                    <td>{{$paciente->direccion}}</td>
                                                    <td>{{$paciente->sexo}}</td>
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
																<a class="dropdown-item" href="{{route('seguimiento.datosByPaciente',$paciente->id)}}"  >Ver todo</a>
															</div>
                                                            {{-- <form id="formEliminar{{$paciente->id}}" method="POST" action="{{route('administrador.destroy',$admin->id)}}">
                                                                @csrf
                                                                {{method_field('DELETE')}}
                                                            </form> --}}
														</div>
													</td>
												</tr>

                                                {{-- MODAL EDITAR admin --}}
            <div class="modal fade modal-add-contact" id="modalEditar{{$paciente->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST" >
                            @method('PATCH')
                            @csrf
                            <div class="modal-header px-4">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Editar Administrador</h5>
                            </div>

                            <div class="modal-body px-4">
                               

                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="firstName">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" >
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
            function eliminarPaciente(id)
            {
                let form = document.getElementById('formEliminar'+id);
                    form.submit();
            }
            </script>
           
            
@endsection


		