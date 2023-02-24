@extends('admin.dashboard')
@section('contenido')
			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Datos de la cita</h1>
							<p class="breadcrumbs"><span><a href="index.html">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Ver Cita</p>
						</div>
						<div>
							<a href="{{route('cita.index')}}" class="btn btn-primary"> Ver Todas
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Datos de la cita</h2>
								</div>

								<div class="card-body">
									<div class="row ec-vendor-uploads">
										
										<div class="col-lg-12">
											<div class="ec-vendor-upload-detail">
												<form class="row g-3">
													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Medico</label>
														<input disabled type="text" name="medico" class="form-control slug-title" value="{{$cita->medico}}" id="medico">
													</div>
													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Asunto</label>
														<input disabled type="text" name="asunto" class="form-control slug-title" value="{{$cita->asunto}}" id="asunto">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Especialidad</label>
														<input disabled type="text" name="especialidad" class="form-control slug-title" value="{{$cita->especialidad}}" id="especialidad">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Teléfono</label>
														<input disabled type="tel" name="telefono" class="form-control slug-title" value="{{$cita->telefono}}" id="telefono">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Fecha Inicio</label>
														<input disabled type="datetime-local"  name="fecha_inicio" class="form-control slug-title" value="{{$cita->fecha_inicio}}" id="fecha_inicio">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Fecha Fin</label>
														<input type="datetime-local" disabled name="fecha_fin" class="form-control slug-title" value="{{$cita->fecha_fin}}" id="fecha_fin">
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

                                <div class="card-header card-header-border-bottom">
									<h2>Datos del paciente</h2>
								</div>

								<div class="card-body">
									<div class="row ec-vendor-uploads">
										
                                        {{-- "nombre",
                                        "apellido",
                                        "edad",
                                        "lugar_nac",
                                        "ocupacion",
                                        "direccion",
                                        "cedula",
                                        "telefono",
                                        "sexo",
                                        "observacion",
                                        "correo" --}}

										<div class="col-lg-12">
											<div class="ec-vendor-upload-detail">
												<form class="row g-3" >
													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Nombre</label>
														<input disabled type="text" name="medico" class="form-control slug-title" value="{{$paciente->nombre}}" id="medico">
													</div>
													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Apellido</label>
														<input disabled type="text" name="asunto" class="form-control slug-title" value="{{$paciente->apellido}}" id="asunto">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Lugar nacimiento</label>
														<input disabled type="text" name="especialidad" class="form-control slug-title" value="{{$paciente->lugar_nac}}" id="especialidad">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Ocupación</label>
														<input disabled type="text" name="telefono" class="form-control slug-title" value="{{$paciente->ocupacion}}" id="telefono">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Dirección</label>
														<input disabled type="text" name="direccion" class="form-control slug-title" value="{{$paciente->direccion}}" id="telefono">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Cedula</label>
														<input disabled type="text" name="telefono" class="form-control slug-title" value="{{$paciente->cedula}}" id="telefono">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Teléfono</label>
														<input disabled type="tel" name="telefono" class="form-control slug-title" value="{{$paciente->telefono}}" id="telefono">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Genero</label>
														<input disabled type="text" name="telefono" class="form-control slug-title" value="{{$paciente->sexo}}" id="telefono">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Correo</label>
														<input disabled type="text" name="telefono" class="form-control slug-title" value="{{$paciente->correo}}" id="telefono">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Edad</label>
														<input disabled type="text" name="telefono" class="form-control slug-title" value="{{$paciente->edad}}" id="telefono">
													</div>
                                                  
                                                    
													
													{{-- <div class="col-md-12">
														<button type="submit" class="btn btn-primary">Guardar</button>
													</div> --}}
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
