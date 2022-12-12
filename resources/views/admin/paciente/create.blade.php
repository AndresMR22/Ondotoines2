
@extends('admin.dashboard')
@section('contenido')
			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Agregar Paciente</h1>
							<p class="breadcrumbs"><span><a href="index.html">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Paciente</p>
						</div>
						<div>
							<a href="{{route('paciente.index')}}" class="btn btn-primary"> Ver Todos
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
												<form class="row g-3" action="{{route('paciente.store')}}" method="POST">
                                                    @csrf
													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Nombre</label>
														<input type="text" name="nombre" class="form-control slug-title" id="nombre">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Apellido</label>
														<input type="text" name="apellido" class="form-control slug-title" id="apellido">
													</div>


                                                 

                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Lugar de nacimiento</label>
														<input type="text" name="lugar_nac" class="form-control slug-title" id="lugar_nac">
													</div>

                                                    
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Ocupación</label>
														<input type="text" name="ocupacion" class="form-control slug-title" id="ocupacion">
													</div>

                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Dirección</label>
														<input type="text" name="direccion" class="form-control slug-title" id="direccion">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">cedula</label>
														<input type="text" name="cedula" class="form-control slug-title" id="cedula">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">telefono</label>
														<input type="text" name="telefono" class="form-control slug-title" id="telefono">
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">sexo</label>
														<input type="text" name="sexo" class="form-control slug-title" id="sexo">
													</div>



                                                    
													{{-- <div class="col-md-6">
														<label class="form-label">Select Categories</label>
														<select name="categories" id="Categories" class="form-select">
															<optgroup label="Fashion">
																<option value="t-shirt">T-shirt</option>
																<option value="dress">Dress</option>
															</optgroup>
															<optgroup label="Furniture">
																<option value="table">Table</option>
																<option value="sofa">Sofa</option>
															</optgroup>
															<optgroup label="Electronic">
																<option value="phone">I Phone</option>
																<option value="laptop">Laptop</option>
															</optgroup>
														</select>
													</div> --}}
												
													
													<div class="col-md-6">
														<label class="form-label">Edad</label>
														<input type="number" name="edad" class="form-control" id="edad">
													</div>
													<div class="col-md-12">
														<label class="form-label">Observación</label>
														<textarea name="observacion" class="form-control" rows="4"></textarea>
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

	