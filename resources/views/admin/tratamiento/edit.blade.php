
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
							<h1>Tratamiento</h1>
							<p class="breadcrumbs"><span><a href="index.html">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Tratamiento</p>
						</div>
						<div>
							<a href="{{route('tratamiento.index')}}" class="btn btn-primary"> Ver Todos
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Editar Tratamiento</h2>
								</div>

								<div class="col-md-12 my-3 d-flex justify-content-center">
									<a onclick="enviar({{$tratamiento->id}});" class="btn btn-primary">Guardar</a>
								</div>


								<div class="card-body">
									<div class="row ec-vendor-uploads">
										
										<div class="col-lg-12">
											<div class="ec-vendor-upload-detail">
												<form class="row g-3" id="formTratamiento" action="{{route('tratamiento.store')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Asunto</label>
														<input type="text" required name="asunto"  value="{{$tratamiento->asunto}}" class="form-control slug-title" id="asunto">
													</div>

                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Especialidad</label>
														<input type="text" required name="especialidad" value="{{$tratamiento->especialidad}}" class="form-control slug-title" id="especialidad">
													</div>


                                                <div class="col-md-12">
                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Medico</label>
														<input type="text" required name="medico" value="{{$tratamiento->medico}}" class="form-control slug-title" id="medico">
													</div>
                                                </div>
												</form>
											</div>
										</div>
									</div>

									<div class="procedimientos d-flex justify-content-center">
										<h4>PROCEDIMIENTOS</h4>
									</div>

									<div class="table-responsive">
										<table id="responsive-data-table" class="table" style="width:100%">
											<thead>
												<tr>
													<th>Imagen</th>
													<th>Nombre</th>
													<th>Cantidad</th>
													<th>Precio</th>
													<td>Subtotal</td>
													<th>Acciones</th>
												</tr>
											</thead>
		
											<tbody>
												@foreach ($tratamiento->procedimientos as $key => $pro)
													<tr>
														{{-- {{$pro->imagen->url}} --}}
														<td>
															@if(isset($pro->imagen))
															<img class="tbl-thumb" src="{{$pro->imagen->url}}"
															alt="Procedimiento" />
															@else
															<img class="tbl-thumb" src="assets/img/products/p1.jpg"
																alt="Procedimiento" />
																@endif
															</td>
														<td>{{ $pro->nombre }}</td>
														<td><input id="cant{{$pro->id}}" onchange="calcularSub({{$pro}});" class="form-control cantidad" style="max-width: 200px;" type="number" value="{{$pro->cantidad}}"></td>
														<td id="precioTd{{$pro->id}}" class="precio">{{ $pro->precio }}</td>
														<td><p id="subtotalTd{{$pro->id}}">0</p></td>
														<td>
															<div class="btn-group mb-1">
																<button type="button" class="btn btn-outline-success">Info</button>
																<button type="button"
																	class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																	data-bs-toggle="dropdown" aria-haspopup="true"
																	aria-expanded="false" data-display="static">
																	<span class="sr-only">Info</span>
																</button>
		
																<div class="dropdown-menu">
																	<a class="dropdown-item" data-bs-toggle="modal"
																		data-bs-target="#modalEditar{{ $pro->id }}">Editar</a>
																	<a onclick="eliminarProcedimiento({{ $pro->id }})"
																		class="dropdown-item">Eliminar</a>
																</div>
																<form id="formEliminar{{ $pro->id }}" method="POST"
																	action="{{ route('procedimiento.destroy', $pro->id) }}">
																	@csrf
																	{{ method_field('DELETE') }}
																</form>
															</div>
														</td>
													</tr>
		
													
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

				var ArrayCantidad = [];

				document.addEventListener('DOMContentLoaded',function(){
					let cantidades = document.querySelectorAll('.cantidad')
					let precios = document.querySelectorAll('.precio')
					cantidades.forEach((cant,i) =>
					{
						let idFila = cant.id;
						let idPro = idFila.substr(4);//retiramos el texto cant del idFila, ejem: cant1 = 1
						let objCant = 
						{
							'id':idPro,
							'cantidad':cant.value
						}
						ArrayCantidad.push(objCant)
						let sub = cant.value*precios[i].innerText
						document.getElementById('subtotalTd'+idPro).textContent = sub;
					})
					console.log(ArrayCantidad)
				})

				function calcularSub(pro)
				{
					let valor = document.getElementById('cant'+pro.id).value
					ArrayCantidad.forEach(element =>{
						if(element.id == pro.id)
						{
							element.cantidad = valor;
						}
					})
					console.log('array res:',ArrayCantidad)
					let precio = document.getElementById('precioTd'+pro.id).textContent
					let sub = valor*precio;
					document.getElementById('subtotalTd'+pro.id).textContent = sub;
				}

				function enviar(id)
				{
					// let form = document.getElementById('formTratamiento')
					let asunto = document.getElementById('asunto').value;
					let especialidad = document.getElementById('especialidad').value
					let medico = document.getElementById('medico').value;

					
					$.ajax({
                        url: `{{ route('tratamiento.editar') }}`,
                        dataType: "json",
                        data: {
                            asunto, especialidad, medico, id,
							'data':ArrayCantidad                            
                            }
                        }).done(function(res) {
                           if(res==1)
						   {
							window.location.href = "/admin/tratamiento"
						   }else
						   {
							alert('No se pudo actualizar el tratamiento')
						   }
                        })
				}
			</script>
@endsection

	