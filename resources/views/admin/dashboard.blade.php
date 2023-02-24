<!DOCTYPE html>
<html lang="en" dir="ltr">

@include('layouts.dashboard.head')

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

	<!--  WRAPPER  -->
	<div class="wrapper">
		<!-- LEFT MAIN SIDEBAR -->
		<div class="ec-left-sidebar ec-bg-sidebar">
			<div id="sidebar" class="sidebar ec-sidebar-footer">

				<div class="ec-brand">
					<a href="index.html" title="Ekka">
						<img class="ec-brand-icon" src="{{asset('images/icons/logo.png')}}" alt="" />
						<span class="ec-brand-name text-truncate">ODNTNS</span>
					</a>
				</div>

				<!-- begin sidebar scrollbar -->
				<div class="ec-navigation" data-simplebar>
					<!-- sidebar menu -->
					<ul class="nav sidebar-inner" id="sidebar-menu">
						<!-- Dashboard -->
						<li class="active">
							<a class="sidenav-item-link" href="{{route('admin.dashboard')}}">
								<i class="mdi mdi-view-dashboard-outline"></i>
								<span class="nav-text">Dashboard</span>
							</a>
							<hr>
						</li>


						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-key"></i>
								<span class="nav-text">Admin</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('administrador.create')}}">
											<span class="nav-text">Agregar</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

						<!-- Vendors -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-calendar"></i>
								<span class="nav-text">Citas</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('cita.index')}}">
											<span class="nav-text">Agendar</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="{{route('admin.calendario')}}">
											<span class="nav-text">Calendario</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

						{{-- <li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-group-outline"></i>
								<span class="nav-text">Odontograma</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('odontograma.index')}}">
											<span class="nav-text">Agendar</span>
										</a>
									</li>

								</ul>
							</div>
						</li> --}}

						

						<!-- Category -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-table-edit"></i>
								<span class="nav-text">Tratamiento</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('tratamiento.create')}}">
											<span class="nav-text">Registrar</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="{{route('tratamiento.index')}}">
											<span class="nav-text">Listar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Products -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-box"></i>
								<span class="nav-text">Pacientes</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="products" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('paciente.create')}}">
											<span class="nav-text">Agregar</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="{{route('paciente.index')}}">
											<span class="nav-text">Listar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Orders -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-table-column-plus-after"></i>
								<span class="nav-text">Procedimiento</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('procedimiento.create')}}">
											<span class="nav-text">Agregar</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="{{route('procedimiento.index')}}">
											<span class="nav-text">Listar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

							<!-- Orders -->
							<li class="has-sub">
								<a class="sidenav-item-link" href="{{route('seguimiento.index')}}">
									<i class="mdi mdi-account-search"></i>
									<span class="nav-text">Seguimiento</span> 
								</a>
							</li>

							<li class="has-sub">
								<a class="sidenav-item-link" href="{{route('seguimiento.index')}}">
									<i class="mdi mdi-bell-ring"></i>
									<span class="nav-text">Notificaciones</span> 
								</a>
							</li>

						
					</ul>
				</div>
			</div>
		</div>

		<!--  PAGE WRAPPER -->
		<div class="ec-page-wrapper">

			<!-- Header -->
			<header class="ec-main-header" id="header">
				<nav class="navbar navbar-static-top navbar-expand-lg">
					<!-- Sidebar toggle button -->
					<button id="sidebar-toggler" class="sidebar-toggle"></button>
					<!-- search form -->
					<div class="search-form d-lg-inline-block">
						<div class="input-group">
							{{-- <input type="text" name="query" id="search-input" class="form-control"
								placeholder="search.." autofocus autocomplete="off" />
							<button type="button" name="search" id="search-btn" class="btn btn-flat">
								<i class="mdi mdi-magnify"></i>
							</button> --}}
						</div>
						<div id="search-results-container">
							<ul id="search-results"></ul>
						</div>
					</div>

					<!-- navbar right -->
					<div class="navbar-right">
						<ul class="nav navbar-nav">
							<!-- User Account -->
							<li class="dropdown user-menu">
								<button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
									aria-expanded="false">
									@if(isset(auth()->user()->imagen))
										<img src="{{auth()->user()->imagen->url}}" class="user-image" alt="User Image" />
										@else
										<img src="" class="user-image" alt="Foto" />
										@endif
								</button>
								<ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
									<!-- User image -->
									<li class="dropdown-header">
										@if(isset(auth()->user()->imagen))
										<img src="{{auth()->user()->imagen->url}}" class="img-circle" alt="User Image" />
										@else
										<img src="" class="img-circle" alt="Foto" />
										@endif
										<div class="d-inline-block">
											{{auth()->user()->name}} <small class="pt-1">{{auth()->user()->email}}</small>
										</div>
									</li>
									<li>
										<a href="user-profile.html">
											<i class="mdi mdi-account"></i> Mi Perfil
										</a>
									</li>
									
									<li class="dropdown-footer">
										<a onclick="event.preventDefault();
										document.getElementById('logout-form').submit();"> <i class="mdi mdi-logout"></i> Cerrar sesión </a>
									</li>
									<form id="logout-form" action="{{ route('logout') }}" method="POST"
									class="d-none">
									@csrf
								</form>
								</ul>
							</li>
							<li class="dropdown notifications-menu custom-dropdown">
								<button class="dropdown-toggle notify-toggler custom-dropdown-toggler">
									<i class="mdi mdi-bell-outline">{{ auth()->user()->unreadNotifications->count() }}</i>
								</button>

								<div class="card card-default dropdown-notify dropdown-menu-right mb-0">
									<div class="card-header card-header-border-bottom px-3">
										<h2>Notificaciones</h2>
									</div>

									<div class="card-body px-0 py-0">
										<ul class="nav nav-tabs nav-style-border p-0 justify-content-between" id="myTab"
											role="tablist">
											<li class="nav-item mx-3 my-0 py-0">
												<a href="#" class="nav-link active pb-3" id="home2-tab"
													data-bs-toggle="tab" data-bs-target="#home2" role="tab"
													aria-controls="home2" aria-selected="true">Pendientes ({{ auth()->user()->unreadNotifications->count() }})</a>
											</li>
										</ul>

										<div class="tab-content" id="myNotifications">
											<div class="tab-pane fade show active" id="home2" role="tabpanel">
												<ul class="list-unstyled" data-simplebar style="height: 360px">
													@foreach (auth()->user()->unreadNotifications as $notification)
													<li>
														<a href="{{ route('marcar_una_leida', [$notification->id, $notification->data['cita_id']]) }}"
															class="media media-message media-notification ">
															<div class="position-relative mr-3">
																<i class="fas {{$notification->data['icon']}}"></i>
																{{-- <span class="status away"></span> --}}
															</div>
														
															<div class="media-body d-flex justify-content-between">
																<div class="message-contents">
																	<h4 class="title">{{$notification->data['nombres']}}</h4>
																	<p class="last-msg">Cita: {{$notification->data['hora']}} de 2023-01-07</p>

																	<span
																		class="font-size-12 font-weight-medium text-secondary">
																		<i class="mdi mdi-clock-outline"></i> Dentro de {{$notification->data['horasFaltantes']}} horas...
																	</span>
																</div>
															</div>
														
														</a>
													</li>
													@endforeach
													

												</ul>
											</div>
										<div style="display:flex; justify-content:center; margin-bottom:20px;">
											<a class="btn btn-outline-info" href="{{route('cita.showNotificaciones')}}">Ver mensajes</a>
										</div>	
										</div>
									</div>
								</div>
							</li>
							<li class="right-sidebar-in right-sidebar-2-menu">
								<i class="mdi mdi-settings-outline mdi-spin"></i>
							</li>
						</ul>
					</div>
				</nav>
			</header>

			<!-- CONTENT WRAPPER -->
		@yield('contenido')

			<!-- Footer -->
			<footer class="footer mt-auto">
				<div class="copyright bg-white">
					<p>
						Copyright &copy; <span id="ec-year"></span><a class="text-primary"
						href="https://themeforest.net/user/ashishmaraviya" target="_blank"> ODONTOINES</a>. Todos los derechos reservados.
					  </p>
				</div>
			</footer>

		</div> <!-- End Page Wrapper -->
	</div> <!-- End Wrapper -->

	@include('layouts.dashboard.scripts')
</body>

</html>