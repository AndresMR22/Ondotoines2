@extends('admin.dashboard')
@section('contenido')
			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Registrar Cita</h1>
							<p class="breadcrumbs"><span><a href="index.html">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Registrar Cita</p>
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
									<h2>Registrar Cita</h2>
								</div>

								<div class="card-body">
									<div class="row ec-vendor-uploads">
										
										<div class="col-lg-12">
											<div class="ec-vendor-upload-detail">
												<form class="row g-3" action="{{route('cita.store')}}" method="POST">
                                                    @csrf
													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Medico</label>
														<input type="text" name="medico" class="form-control slug-title" id="medico">
													</div>
													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Asunto</label>
														<input type="text" name="asunto" class="form-control slug-title" id="asunto">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Especialidad</label>
														<input type="text" name="especialidad" class="form-control slug-title" id="especialidad">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Teléfono</label>
														<input type="tel" name="telefono" class="form-control slug-title" id="telefono">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Fecha Inicio</label>
														<input type="datetime-local"  name="fecha_inicio" class="form-control slug-title" id="fecha_inicio">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Fecha Fin</label>
														<input type="datetime-local" name="fecha_fin" class="form-control slug-title" id="fecha_fin">
													</div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Pacientes</label>
                                                        <select name="paciente_id" id="paciente" class="form-select">
                                                                @foreach($pacientes as $paciente)
                                                                <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                                                                @endforeach
                                                        </select>
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
