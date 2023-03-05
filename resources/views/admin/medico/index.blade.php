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
							<h1>Medicos</h1>
							<p class="breadcrumbs"><span><a href="">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Medicos</p>
						</div>
						<div>
							<a href="{{route('medico.create')}}" class="btn btn-primary"> Agregar medico</a>
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
													<th>Nombres</th>
													<th>Especialidad</th>
													<th>Acciones</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach($medicos as $medico)
												<tr>
													<td>{{$medico->nombre}}</td>
													<td>{{$medico->especialidad}}</td>
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
																<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditar{{$medico->id}}" >Editar</a>
																<a onclick="eliminarPaciente({{$medico->id}})" class="dropdown-item" >Eliminar</a>
															</div>
                                                            <form id="formEliminar{{$medico->id}}" method="POST" action="{{route('medico.destroy',$medico->id)}}">
                                                                @csrf
                                                                {{method_field('DELETE')}}
                                                            </form>
														</div>
													</td>
												</tr>

                                                {{-- MODAL EDITAR Medico --}}
            <div class="modal fade modal-add-contact" id="modalEditar{{$medico->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{route('medico.update',$medico->id)}}">
                            @method('PATCH')
                            @csrf
                            <div class="modal-header px-4">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Editar Especialidad</h5>
                            </div>

                            <div class="modal-body px-4">

                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="firstName">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$medico->nombre}}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lastName">Especialidad</label>
                                            <input type="text" class="form-control" name="especialidad" id="especialidad" value="{{$medico->especialidad}}" required>
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
                      <div class="modal fade modal-add-contact" id="modalObservacion{{$medico->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form method="POST" action="{{route('medico.update',$medico->id)}}">
                                    @method('PATCH')
                                    @csrf
                                    <div class="modal-header px-4">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Observación</h5>
                                    </div>
        
                                    <div class="modal-body px-4">
        
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea class="form-control">{{$medico->observacion}}</textarea>
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

            <script>
            function eliminarPaciente(id)
            {
                let form = document.getElementById('formEliminar'+id);
                    form.submit();
            }
            </script>
           
            
@endsection


		