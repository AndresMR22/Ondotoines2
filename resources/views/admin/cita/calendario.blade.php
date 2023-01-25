
@extends('admin.dashboard')
@section('contenido')
			<!-- CONTENT WRAPPER -->
			

								
									<div class="container">
										<div id="calendar"></div>
									</div>

									<input type="hidden" name="citas" id="citas" value="{{$citas}}">

									 {{-- MODAL EDITAR PROCEDIMIENTO --}}
									 <div class="modal fade modal-add-contact" id="modalEditar"
										tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
											<div class="modal-content">
												<form method="POST"
													action="">
													@method('PATCH')
													@csrf
													<div class="modal-header px-4">
														<h5 class="modal-title" id="exampleModalCenterTitle">Cita Agendada</h5>
													</div>

													<div class="modal-body px-4">

														<div class="row mb-2">
															<div class="col-lg-6">
																<div class="form-group">
																	<label for="firstName">Fecha</label>
																	<input type="datetime" class="form-control"
																		name="fecha" id="fecha" readonly>
																</div>
															</div>

															

														</div>
													</div>

													<div class="modal-footer px-4">
														<button type="button" class="btn btn-secondary btn-pill"
															data-bs-dismiss="modal">Cancelar</button>
														<button type="submit"
															class="btn btn-primary btn-pill">Guardar
															cambios</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								
       @include('layouts.scripts')

@endsection

	