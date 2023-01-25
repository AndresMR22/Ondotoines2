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
							<h1>Citas</h1>
							<p class="breadcrumbs"><span><a href="">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Citas</p>
						</div>
						<div>
							<a data-bs-toggle="modal" data-bs-target="#modalAgendar" class="btn btn-primary"> Agendar Cita</a>
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
													<th>Médico</th>
                                                    <th>Paciente</th>
                                                    <th>Teléfono</th>
													<th>Fecha inicio</th>
													<th>Fecha fin</th>
                                                    <th>Estado</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach($citas as $cita)
												<tr>
													<td>{{$cita->medico}}</td>
                                                    <td>{{$cita->paciente->nombre}}</td>
                                                    <td>{{$cita->telefono}}</td>
													<td>{{$cita->fecha_inicio}}</td>
													<td>{{$cita->fecha_fin}}</td>
                                                    <td>{{$cita->estado}}</td>
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
																<a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#modalEditarCita{{$cita->id}}" >Editar</a>
																<a onclick="eliminarCita({{$cita->id}});" class="dropdown-item" >Eliminar</a>
															</div>
                                                            <form id="formEliminar{{$cita->id}}" method="POST" action="{{route('cita.destroy',$cita->id)}}">
                                                                @csrf
                                                                {{method_field('DELETE')}}
                                                            </form>
														</div>
													</td>
												</tr>

                                                <div class="modal fade modal-add-contact" id="modalEditarCita{{$cita->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" id="formEditarCita{{$cita->id}}" action="{{route('cita.update',$cita->id)}}">
                                                                @method('PATCH')
                                                                @csrf
                                                                <div class="modal-header px-4">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Editar Cita</h5>
                                                                </div>
                                    
                                                                <div class="modal-body px-4">
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="firstName">Medico</label>
                                                                                <input type="text" class="form-control" name="medico" id="medico" value="{{$cita->medico}}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="firstName">Especialidad</label>
                                                                                <input type="text" class="form-control" name="especialidad" id="especialidad" value="{{$cita->especialidad}}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="firstName">Estado</label>
                                                                                <select name="estado" id="estado" class="form-select" required>
                                                                                    <option value="pendiente" {{$cita->estado == 'pendiente'?'selected':''}}>Pendiente</option>
                                                                                    <option value="atendido" {{$cita->estado != 'pendiente'?'selected':''}}>Atendido</option>
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="firstName">Teléfono</label>
                                                                                <input type="tel" class="form-control" name="telefono" required id="telefono" value="{{$cita->telefono}}">
                                                                           </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="firstName">Fecha Inicio</label>
                                                                                <input type="datetime-local" required class="form-control" name="fecha_inicio" id="fecha_inicioEditar{{$cita->id}}" value="{{$cita->fecha_inicio}}">
                                                                         </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="firstName">Fecha Fin</label>
                                                                                <input type="datetime-local" required class="form-control" name="fecha_fin" id="fecha_finEditar{{$cita->id}}" value="{{$cita->fecha_fin}}">
                                                                           </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                    
                                                                <div class="modal-footer px-4">
                                                                    <button type="button" class="btn btn-secondary btn-pill"
                                                                        data-bs-dismiss="modal">Cancelar</button>
                                                                    <a onclick="guardarCambios({{$cita->id}});" class="btn btn-primary btn-pill">Guardar cambios</a>
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


    <div class="modal fade modal-add-contact" id="modalAgendar" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{route('cita.store')}}" id="formAgendarCita">
                            @csrf
                            <div class="modal-header px-4">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Agendar Cita</h5>
                            </div>

                            <div class="modal-body px-4">

                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="firstName">Médico</label>
                                            <input type="text" class="form-control" name="medico" id="medico" value="{{old('medico')}}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lastName">Especialidad</label>
                                            <input type="text" class="form-control" name="especialidad" value="{{old('especialidad')}}"  id="especialidad" >
                                        </div>
                                    </div>

                                   

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="email">Fecha Inicio</label>
                                            <input type="datetime-local" min="{{date('Y-m-d H:i')}}" class="form-control" value="{{old('fecha_inicio')}}" onchange="selectFI();" name="fecha_inicio" id="fecha_inicio"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="Birthday">Fecha Fin</label>
                                            <input type="datetime-local" class="form-control" value="{{old('fecha_fin')}}" onchange="selectFF();" name="fecha_fin" id="fecha_fin"
                                               required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="userName">Teléfono</label>
                                            <input type="tel" class="form-control" value="{{old('telefono')}}" required name="telefono" id="telefono">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="form-label">Paciente</label>
                                            <select name="paciente_id" id="paciente" class="form-select" required>
                                                    @foreach($pacientes as $paciente)
                                                    <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                   
                                </div>
                            </div>

                            <div class="modal-footer px-4">
                                <button type="button" class="btn btn-secondary btn-pill"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <a onclick="enviar()" class="btn btn-primary btn-pill">Guardar cambios</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
                integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
                crossorigin="anonymous" referrerpolicy="no-referrer">
            </script>

            <script>
                var fechaInicio = null;
                var fechaFin = null;
                var fechasSeleccionadas = false;
                function selectFI()
                {
                    fechaInicio = document.getElementById('fecha_inicio').value;
                    document.getElementById('fecha_fin').min = fechaInicio;
                    if(fechaFin!=null)
                    {
                        fechasSeleccionadas=true;
                    }
                    console.log('fechasSeleccionadas',fechasSeleccionadas)
                }
                function selectFF()
                {
                    fechaFin = document.getElementById('fecha_fin').value;
                    if(fechaInicio!=null)
                    {
                        fechasSeleccionadas=true;
                    }
                    console.log('fechasSeleccionadas',fechasSeleccionadas)
                }

                function formatearFecha(fecha)
                {
                    let anio = fecha.getFullYear();
                    let mes = fecha.getMonth()+1;
                    let dia = fecha.getDate();
                    let hora = fecha.getHours();
                    let min = fecha.getMinutes();
                    let seg = fecha.getSeconds();
                    if(mes<10)
                    {
                        mes = '0'+mes;
                    }
                    if(dia<10)
                    {
                        dia = '0'+dia;
                    }
                    let fechaNueva = anio+'-'+mes+'-'+dia+' '+hora+':'+min+':'+seg+'0'
                    return fechaNueva;
                }

                function enviar()
                {
                    let form = document.getElementById('formAgendarCita')
                    if(fechasSeleccionadas)
                    {
                        console.log('entraste')
                        let dateFI = new Date(fechaInicio);
                        let dateFF = new Date(fechaFin);
                       let fechaIN = formatearFecha(dateFI);
                       let fechaFN = formatearFecha(dateFF);
                        //ajax validacion
                        $.ajax({
                        url: "{{ route('cita.validarHorario') }}",
                        dataType: "json",
                        data: {
                            fechaIN,
                            fechaFN
                            }
                        }).done(function(res) {
                            if (res.fechaInicio==null && res.fechaFin==null)
                            {
                                alert('todo bien')
                                form.submit();
                            }else
                            {
                                alert('Ya cuenta con una cita para el horario entre las '+res.fechaInicio+' y las '+res.fechaFin)
                            }
                            
                        })
                        
                    }
                    else
                    {
                        alert('Asegurese de indicar el horario de inicio y fin de la cita.')
                    }
                       
                }

                function guardarCambios(idForm)
                {
                    let fechaInicio = document.getElementById('fecha_inicioEditar'+idForm).value;
                    let fechaFin = document.getElementById('fecha_finEditar'+idForm).value;
                    fechaInicio = new Date(fechaInicio);
                    fechaFin = new Date(fechaFin);
                    fechaInicio = formatearFecha(fechaInicio);
                    fechaFin = formatearFecha(fechaFin);
                    document.getElementById('fecha_inicioEditar'+idForm).value = fechaInicio;
                    document.getElementById('fecha_finEditar'+idForm).value = fechaFin;
                    document.getElementById('formEditarCita'+idForm).submit();
                }

                function eliminarCita(idCita)
                {
                    let form = document.getElementById('formEliminar'+idCita);
                    form.submit();
                }

            </script>
@endsection


		