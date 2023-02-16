
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
														<input type="text" name="nombre" class="form-control slug-title" value="{{old('nombre')}}" id="nombre" required>
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Apellido</label>
														<input type="text" name="apellido" class="form-control slug-title" value="{{ old('apellido') }}" id="apellido" required>
													</div>

													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Correo</label>
														<input type="email" name="correo" class="form-control slug-title" value="{{ old('correo') }}" id="correo" required>
													</div>

                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Lugar de nacimiento</label>
														<input type="text" name="lugar_nac" class="form-control slug-title" value="{{ old('lugar_nac') }}" id="lugar_nac" required>
													</div>

                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Ocupación</label>
														<input type="text" name="ocupacion" class="form-control slug-title" value="{{ old('ocupacion') }}" id="ocupacion" required>
													</div>

                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Dirección</label>
														<input type="text" name="direccion" class="form-control slug-title" value="{{ old('direccion') }}" id="direccion" required>
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">cedula</label>
														<input type="text" name="cedula" class="form-control slug-title" value="{{ old('cedula') }}" id="cedula" required>
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">telefono</label>
														<input type="tel" name="telefono" class="form-control slug-title" value="{{ old('telefono') }}" id="telefono" required>
													</div>
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">sexo</label>
														<input type="text" name="sexo" class="form-control slug-title" value="{{ old('sexo') }}" id="sexo" required>
													</div>
												
													
													<div class="col-md-6">
														<label class="form-label">Edad</label>
														<input type="number" name="edad" class="form-control" id="edad" value="{{ old('edad') }}" required>
													</div>
													<div class="col-md-12">
														<label class="form-label">Observación</label>
														<textarea name="observacion" class="form-control" value="{{ old('observacion') }}" rows="4"></textarea>
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

	