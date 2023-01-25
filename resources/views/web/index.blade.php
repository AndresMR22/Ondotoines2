<!DOCTYPE html>
<html lang="en">
	@include('layouts.head')
	
	<body class="sign-inup" id="body">
		<div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-10">
					<div class="card">
						<div class="card-header bg-primary">
							<div class="ec-brand">
								<a href="index.html" title="Ekka">
									<img class="ec-brand-icon" src="{{asset('images/icons/logo.png')}}" alt="" />
								</a>
							</div>
						</div>
						<div class="card-body p-5">
							<h4 class="text-dark mb-5">Iniciar sesión</h4>
							
							<form action="{{ route('login') }}" method="POST">
                                @csrf
								<div class="row">
									<div class="form-group col-md-12 mb-4">
										<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  id="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Correo electrónico" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
									
									<div class="form-group col-md-12 ">
										<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="current-password" placeholder="Ingrese su contraseña" required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
									
									<div class="col-md-12">
										{{-- <div class="d-flex my-2 justify-content-between">
											<div class="d-inline-block mr-3">
												<div class="control control-checkbox">Remember me
													<input type="checkbox" />
													<div class="control-indicator"></div>
												</div>
											</div>
											
											<p><a class="text-blue" href="#">Forgot Password?</a></p>
										</div> --}}
										
										<button type="submit" class="btn btn-primary btn-block mb-4">Iniciar</button>
										
										<p class="sign-upp">No tienes una cuenta ?
											<a class="text-blue" href="{{route('register')}}">Registrarse</a>
										</p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Javascript -->
		<script src="{{asset('admin/assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/jquery-zoom/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/slick/slick.min.js')}}"></script>
	
		<!-- Ekka Custom -->	
		<script src="{{asset('admin/assets/js/ekka.js')}}"></script>
	</body>
</html>