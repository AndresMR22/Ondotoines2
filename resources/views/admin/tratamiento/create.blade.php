@extends('admin.dashboard')
@section('contenido')
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                <h1>Tratamiento</h1>
                <p class="breadcrumbs"><span><a href="index.html">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Tratamiento</p>
        </div>
        <div class="my-3 d-flex justify-content-center">
            <a data-bs-toggle="modal" data-bs-target="#modalProcedimientos" class="btn btn-primary">Agregar Procedimiento</a>
        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-12">
                <div class="ec-cat-list card card-default mb-24px">
                    <div class="card-body">
                        <div class="ec-cat-form">
                            <h4>Registrar tratamiento</h4>

                            <form method="POST" action="{{route('tratamiento.store')}}" id="formTratamiento">
                                @csrf
                                <div class="form-group row">
                                    <label for="text" class="col-12 col-form-label">Asunto</label> 
                                    <div class="col-12">
                                        <input id="asunto" name="asunto" class="form-control here slug-title" type="text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="slug" class="col-12 col-form-label">Medico</label> 
                                    <div class="col-12">
                                        <input id="medico" name="medico" class="form-control here set-slug" type="text">
                                        {{-- <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small> --}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-form-label"> Observación</label> 
                                    <div class="col-12">
                                        <textarea id="observacion" name="observacion" cols="40" rows="2" class="form-control"></textarea>
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="form-label">Pacientes</label>
                                    <select name="paciente_id" id="paciente" class="form-select">
                                        {{-- <optgroup label="Fashion"> --}}
                                            @foreach($pacientes as $paciente)
                                            <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                                            @endforeach
                                        {{-- </optgroup> --}}
                                    </select>
                                </div>
                               

                                <div class="form-group row">
                                    <label for="slug" class="col-12 col-form-label">Especialidad</label> 
                                    <div class="col-12">
                                        <input id="especialidad" name="especialidad" class="form-control here set-slug" type="text">
                                        {{-- <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small> --}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <a onclick="guardar()" class="btn btn-primary">Guardar</a>
                                    </div>
                                </div>

                                <input type="hidden" name="procedimientos" id="procedimientos">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12">
                <div class="ec-cat-list card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsive-data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody id="proSelecccionados">
                                    
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
                                                <form  >
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
                        
                                                                    <tbody>
                                                                        @foreach($procedimientos as $key => $procedimiento)
                                                                        <tr >
                                                                            <td id="nombre{{$key}}">{{$procedimiento->nombre}}</td>
                                                                            <td><input type="number" name="cantidad[]" min="0" max="20" class="form-control slug-title" id="cantidad{{$key}}" onchange="calcularTotal({{$key}})" value="1"></td>
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
                        
                                                    {{-- <div class="modal-footer px-4">
                                                        <button type="button" class="btn btn-secondary btn-pill"
                                                            data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary btn-pill">Guardar cambios</button>
                                                    </div> --}}
                                                </form>
                                            </div>
                                        </div>
                                    </div>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var proSelected = []

    function guardar()
    {
        let form = document.getElementById('formTratamiento');
        document.getElementById('procedimientos').value = JSON.stringify(proSelected)
        form.submit();
    }

    function calcularTotal(idFila)
    {
        let inputTotal = document.getElementById('total'+idFila)
        let cantidad = document.getElementById('cantidad'+idFila).value
        let precio = document.getElementById('precio'+idFila).value
        inputTotal.value = cantidad*precio; 
    }

    function estaMarcado(idFila)
    {
        let id = document.getElementById('idPro'+idFila).value;
        let esta = false;
        for(let i=0; i<proSelected.length; i++)
        {
            if(proSelected[i].id == id)
            {
                esta = true;
            }
        }
      return esta;
    }

    function marcarPro(idFila)
    {
        let esta = estaMarcado(idFila);
        if(esta)
        {
            alert('El procedimiento ya esta registrado')
        }else{
        let id = document.getElementById('idPro'+idFila).value;
        let cantidad = document.getElementById('cantidad'+idFila).value;
        let precio = document.getElementById('precio'+idFila).value;
        let nombre = document.getElementById('nombre'+idFila).textContent;
        let total = cantidad*precio;
        let data = {id, idFila, nombre, cantidad, precio, total}
        proSelected.push(data)
        actualizarProSelected();
        }
    }

    function actualizarProSelected()
    {
      console.log(proSelected)
        let tbody = document.getElementById('proSelecccionados');
        $(tbody).empty();
        for(let i = 0; i<proSelected.length ; i++)
        {
            let total = proSelected[i].precio * proSelected[i].cantidad;
            let fila = `<tr id="fila${i}">
                                        <td>${proSelected[i].nombre}</td>
                                        <td>${proSelected[i].cantidad}</td>
                                        <td>${proSelected[i].precio}</td>
                                        <td>${total}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" onclick="eliminarFila(${i})"
                                                    class="btn btn-outline-danger">-</button>
                                            </div>
                                        </td>
                                    </tr>`
        
            $(tbody).append(fila);
        }
    }

    function eliminarFila(idFilaProc)
    {
        $('#fila'+idFilaProc).remove();
    //    for(let i =0 ; i<proSelected.length ; i++)
    //    {
    //     console.log('eliminar',proSelected[i])
    //    }
        console.log('idFilaProc:'+idFilaProc)
        proSelected = proSelected.filter(item => item.idFila != idFilaProc)
        console.log(proSelected)
    }

</script>