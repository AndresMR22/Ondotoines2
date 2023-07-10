
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
														<label for="inputEmail4" class="form-label">Medico</label>
														<input type="text" required name="medico" value="{{$tratamiento->medico}}" class="form-control slug-title" id="medico">
													</div>

                                                    <div class="col-md-6">
														<label for="inputEmail4" class="form-label">Observación</label>
                                                        <textarea class="form-control" name="observacion" id="observacion">{{ $tratamiento->observacion }}</textarea>
													</div>

												</form>
											</div>
										</div>
									</div>

									<div class="procedimientos d-flex justify-content-center align-items-center">
										<h4>PROCEDIMIENTOS</h4>
                                        <a data-bs-toggle="modal" data-bs-target="#modalProcedimientos" title="Agregar procedimiento" class="btn btn-outline-success mx-2">
                                            <i class="fas fa-plus"></i>
                                        </a>
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
												</tr>
											</thead>

											<tbody id="procedimientosActuales">
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
														<td>
                                                            <input min="1" id="cant{{$pro->id}}" onchange="calcularSub({{$pro}});" class="form-control cantidad" style="max-width: 200px;" type="number" value="{{$pro->cantidad}}">
                                                        </td>
														<td id="precioTd{{$pro->id}}" class="precio">{{ $pro->precio }}</td>
														<td><p id="subtotalTd{{$pro->id}}">0</p></td>

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

            {{-- MODAL LISTADO PROCEDIMIENTOS --}}
            <div class="modal fade modal-add-contact" id="modalProcedimientos" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">

                            <div class="modal-header px-4 d-flex justify-content-between" >
                                <div>
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Procedimientos disponibles</h5>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-secondary btn-pill"
                                    data-bs-dismiss="modal">X</button>
                                </div>
                            </div>

                            <div class="modal-body px-4">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="responsive-data-table" class="table"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Total</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="procedimientosTabla">
                                                @foreach($procedimientos as $key => $procedimiento)
                                                <tr >
                                                    <td id="nombre{{$key}}">{{$procedimiento->nombre}}</td>
                                                    <td><input type="number" min="1" name="cantidad[]" min="0" max="20" class="form-control slug-title" id="cantidad{{$key}}" onchange="calcularTotal({{$key}})" value="1"></td>
                                                    <td><input type="number" name="precio[]" min="0" class="form-control slug-title" id="precio{{$key}}" value="{{$procedimiento->precio}}" readonly></td>
                                                    <td><input type="number" name="total[]" class="form-control slug-title" id="total{{$key}}" readonly></td>
                                                    <td>
                                                        <div class="btn-group mb-1">
                                                            <button type="button" onclick="marcarPro({{$key}});"
                                                                class="btn btn-outline-success">+</button>
                                                        </div>
                                                    </td>
                                                    <input type="hidden" id="idPro{{$key}}" value="{{$procedimiento->id}}">
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>




                    </div>
                </div>
            </div>

			<script>

				var ArrayCantidad = [];
                var arrayProcedimientos = []
                var arrayNuevosProc = []

				document.addEventListener('DOMContentLoaded',function(){
                    arrayProcedimientos = {!! json_encode($tratamiento->procedimientos) !!}
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

                function calcularSub2(id)
                {
                    let valor = document.getElementById('cantidad'+id).value
					// console.log('array res:',ArrayCantidad)
					let precio = document.getElementById('precioNuevo'+id).textContent
					let sub = valor*Number(precio);
					document.getElementById('subtotalNuevo'+id).textContent = sub;
                }

				function enviar(id)
				{
					let medico = document.getElementById('medico').value;
                    let observacion = document.getElementById('observacion').value
                    var ArrayCantidadTodos = []
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
						ArrayCantidadTodos.push(objCant)
					})

					$.ajax({
                        url: `{{ route('tratamiento.editar') }}`,
                        dataType: "json",
                        data: {
                            observacion,medico, id,
							data:ArrayCantidad,
                            cantidades:ArrayCantidadTodos,
                            procedimientos:arrayProcedimientos,
                            nuevosProcedimientos:arrayNuevosProc
                            }
                        }).done(function(res) {
                           if(res==1)
						   {
							window.location.href = "/admin/tratamiento"
						   }else if(res == 3)
                           {
                            alert('Complete el campo de Medico')
                           }else
						   {
							alert('No se pudo actualizar el tratamiento')
						   }
                        })
				}

    function marcarPro(idFila)
    {
        let esta = estaMarcado(idFila);
        if(esta)
        {
            alert('El procedimiento ya esta registrado')
        }else{
        let id = Number(document.getElementById('idPro'+idFila).value);
        let cantidad = document.getElementById('cantidad'+idFila).value;
        let precio = document.getElementById('precio'+idFila).value;
        let nombre = document.getElementById('nombre'+idFila).textContent;
        let total = cantidad*precio;
        let nuevo = 1;//para saber si es un nuevo procedimiento insertado.
        let data = {id, idFila, nombre, cantidad, precio, total, nuevo}
        arrayProcedimientos.push(data)
        arrayNuevosProc.push(data)
        console.log('array procedimientos:',arrayProcedimientos)
        actualizarProSelected();
        }
    }

    function estaMarcado(idFila)
    {
        let id = document.getElementById('idPro'+idFila).value;
        let esta = false;
        for(let i=0; i<arrayProcedimientos.length; i++)
        {
            if(arrayProcedimientos[i].id == id)
            {
                esta = true;
            }
        }
      return esta;
    }

    function actualizarProSelected()
    {
        let tbody = document.getElementById('procedimientosActuales');
        for(let i = 0; i<arrayProcedimientos.length ; i++)
        {
            if(arrayProcedimientos[i].nuevo == 1)
            {
                let procedimiento =
                {
                    id: Number(arrayProcedimientos[i].id),
                    cantidad:arrayProcedimientos[i].cantidad,
                    nombre:arrayProcedimientos[i].nombre,
                    precio:arrayProcedimientos[i].precio
                }
                procedimiento = JSON.stringify(procedimiento)

                console.log(procedimiento);

                let total = arrayProcedimientos[i].precio * arrayProcedimientos[i].cantidad;
                let fila = `<tr id="filaNueva${i}">
                                            <td><img src="" alt="img de procedimiento"></td>
                                            <td>${arrayProcedimientos[i].nombre}</td>
                                            <td>
                                                <input min="1" id="cantidad${i+1}" onchange="calcularSub2(${i+1});" class="form-control cantidad" style="max-width: 200px;" type="number" value="${arrayProcedimientos[i].cantidad}">
                                            </td>
                                            <td id="precioNuevo${i+1}">${arrayProcedimientos[i].precio}</td>
                                            <td id="subtotalNuevo${i+1}">${total}</td>
                                        </tr>`

                $(tbody).append(fila);
            }
        }
    }

    function calcularTotal(idFila)
    {
        let inputTotal = document.getElementById('total'+idFila)
        let cantidad = document.getElementById('cantidad'+idFila).value
        let precio = document.getElementById('precio'+idFila).value
        inputTotal.value = cantidad*precio;
    }
			</script>
@endsection

