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
							<h1>Pacientes</h1>
							<p class="breadcrumbs"><span><a href="">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Pacientes</p>
						</div>
						<div>
							<a href="{{route('paciente.create')}}" class="btn btn-primary"> Agregar paciente</a>
						</div>
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
													<th>Paciente</th>
													<th>Nombres</th>
													<th>Edad</th>
													<th>Cedula</th>
													<th>Teléfono</th>
													<th>Sexo</th>
													<th>Acciones</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach($pacientes as $paciente)
												<tr>
													<td><img class="tbl-thumb" src="assets/img/products/p1.jpg" alt="Product Image" /></td>
													<td>{{$paciente->nombre}} {{$paciente->apellido}}</td>
													<td>{{$paciente->edad}}</td>
													<td>{{$paciente->cedula}}</td>
													<td>{{$paciente->telefono}}</td>
													<td>{{$paciente->sexo}}</td>
													<td>
                                                        <a class="btn btn-info" title="Observaciones" data-bs-toggle="modal" data-bs-target="#modalObservacion{{$paciente->id}}" ><i class="fas fa-eye"></i></a>
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
																<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditar{{$paciente->id}}" >Editar</a>
																<a data-bs-toggle="modal" data-bs-target="#modalEliminar{{$paciente->id}}" class="dropdown-item" >Eliminar</a>
															</div>
                                                            <form id="formEliminar{{$paciente->id}}" method="POST" action="{{route('paciente.destroy',$paciente->id)}}">
                                                                @csrf
                                                                {{method_field('DELETE')}}
                                                            </form>
														</div>
													</td>
												</tr>

                                                {{-- MODAL EDITAR PACIENTE --}}
            <div class="modal fade modal-add-contact" id="modalEditar{{$paciente->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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

                                    {{-- <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="userName">Edad</label>
                                            <input type="number" class="form-control" name="edad" id="edad"
                                                value="{{$paciente->edad}}" required>
                                        </div>
                                    </div> --}}

                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label class="form-label">Fecha de nacimiento</label>
                                                <input type="date" name="fecha_nac" class="form-control" id="fecha_nac"  value="{{$paciente->fecha_nac}}" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="inputEmail4" class="form-label">Lugar de nacimiento</label>
                                                <input type="text" name="lugar_nac" class="form-control slug-title"  value="{{$paciente->lugar_nac}}" id="lugar_nac" required>
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
            </div>




                      {{-- MODAL OBSERVACION --}}
                    <div class="modal fade modal-add-contact" id="modalObservacion{{$paciente->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form method="POST" action="{{route('paciente.update',$paciente->id)}}">
                                    @method('PATCH')
                                    @csrf
                                    <div class="modal-header px-4">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Observación</h5>
                                    </div>
        
                                    <div class="modal-body px-4">
        
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea class="form-control">{{$paciente->observacion}}</textarea>
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

                        {{-- MODAL PARA ELIMINAR  --}}

                    <div class="modal fade modal-add-contact" id="modalEliminar{{$paciente->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <div class="modal-header px-4">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Atención</h5>
                                    </div>
        
                                    <div class="modal-body px-4">
        
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                   <h5 class="text-center">¿Estas seguro de eliminar al paciente {{$paciente->nombre}}</h5> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="modal-footer px-4">
                                        <button type="button" class="btn btn-secondary btn-pill"
                                            data-bs-dismiss="modal">No, cancelar</button>
                                        <a onclick="eliminarPaciente({{ $paciente->id }})"  class="btn btn-primary btn-pill">Si, eliminar.</a>
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
            function eliminarPaciente(id)
            {
                let form = document.getElementById('formEliminar'+id);
                    form.submit();
            }
            </script>
           
            
@endsection


		