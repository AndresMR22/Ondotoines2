
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
							<h1>Agregar Procedimiento</h1>
							<p class="breadcrumbs"><span><a href="index.html">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Procedimiento</p>
						</div>
						<div>
							<a href="{{route('procedimiento.index')}}" class="btn btn-primary"> Ver Todos
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Agregar Procedimiento</h2>
								</div>

								<div class="card-body">
									<div class="row ec-vendor-uploads">

										<div class="col-lg-12">
											<div class="ec-vendor-upload-detail">
												<form class="row g-3" action="{{route('procedimiento.store')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Nombre</label>
														<input type="text" name="nombre" value="{{old('nombre')}}" class="form-control slug-title @error('nombre') is-invalid @enderror" id="nombre">
                                                        @error('nombre')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>

													<div class="col-md-6">
														<label class="form-label">Precio</label>
														<input type="number" value="{{old('precio')}}" min="0" name="precio" class="form-control @error('precio') is-invalid @enderror" id="precio">
                                                        @error('precio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>

													<div class="col-md-6">
														<label class="form-label">Imagen</label>
														<input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" id="imagen">
                                                        @error('imagen')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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

