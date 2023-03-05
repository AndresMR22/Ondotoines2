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

<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                <h1>Tratamiento</h1>
                <p class="breadcrumbs"><span><a href="index.html">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Tratamiento</p>
        </div>
        <div class="my-3 d-flex justify-content-center" style="gap:20px;">
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
                                    <label class="form-label">Medicos</label>
                                    <select name="medico" id="medico" class="form-select">
                                            @foreach($medicos as $medico)
                                            <option value="{{$medico->nombre}}">{{$medico->nombre}}</option>
                                            @endforeach
                                    </select>
                                </div>


                                <div class="form-group row">
                                    <label class="col-12 col-form-label"> Observación</label> 
                                    <div class="col-12">
                                        <textarea id="observacion" name="observacion" cols="40" rows="2" class="form-control"></textarea>
                                    </div>
                                </div> 

                                <p id="textoId"></p> 

                                <div class="form-group row">
                                    <label class="col-12 col-form-label"> Paciente</label> 
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="texto" id="texto">
                                    </div>
                                    <div class="col-4">
                                        <a class="btn btn-primary" onclick="buscarPaciente()"><i class="fas fa-search"></i></a>
                                    </div>
                                </div>


                                <div class="resultadosPaciente" id="resultadosPaciente">
                                    
                                </div>
                               

                                <div class="form-group row">
                                    <label for="slug" class="col-12 col-form-label">Especialidad</label> 
                                    <div class="col-12">
                                        <input id="especialidad" name="especialidad" class="form-control here set-slug" type="text">
                                        {{-- <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small> --}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <a onclick="guardar()" class="btn btn-primary">Guardar</a>
                                    </div>
                                </div>

                                <input type="hidden" name="procedimientos" id="procedimientos">
                               
                                <input type="hidden" name="paciente_id" id="paciente_id">
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
        if(proSelected.length == 0)
        {
            alert('Debe agregar al menos 1 procedimiento al tratamiento.')
        }else
        {
            let form = document.getElementById('formTratamiento');
            document.getElementById('procedimientos').value = JSON.stringify(proSelected)
            form.submit();
        }
       
    }

    document.addEventListener('DOMContentLoaded',function(){
        let bodyPro = document.getElementById('procedimientosTabla');
        console.log(bodyPro.children)
        let tr = bodyPro.children;
        for(let i = 0; i < tr.length ; i++)
        {
            let cantidad = tr[i].children[1].children[0].value
            let precio = tr[i].children[2].children[0].value
            let id = tr[i].children[3].children[0].id
            // console.log(id)
            document.getElementById(id).value = cantidad*precio;
        }
        
    })

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
                                                <a type="button" onclick="eliminarFila(${i})"
                                                    class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
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

       

    function buscarPaciente()
    {
        let texto = document.getElementById('texto').value
        if(texto.length>=3)
        {
            $.ajax({
                            url: "{{ route('tratamiento.buscarPaciente') }}",
                            dataType: "json",
                            data: {
                                nombre:texto
                                }
                            }).done(function(res)
                            {
                                let bodyPacientes = document.getElementById('resultadosPaciente')
                                $(bodyPacientes).empty();
                                res.forEach((item,i)=>{
                                    $(bodyPacientes).append(`
                                    <div style="display:flex; justify-content:center; transform: scale(0.7);">
                                   <input type="checkbox" class="checkbox" class="checkbox" name="paciente_id" id="paciente${item.id}" >
                                    <label class="form-control">${item.nombre} ${item.apellido}</label>  
                                    </div>
                                    `);
    
                                    document.querySelectorAll('li.nav-item').forEach(item => {
                                        
                                    });
    
                                   document.querySelectorAll('.checkbox').forEach(item =>
                                   {
                                        item.addEventListener('click', traer);
                                   })
    
                                })
                            })
        }else
        {
            alert('Ingrese minimo 3 letras para la búsqueda')
        }

                    
    }

    var texto = "";
    function traer(e)
    {
        // console.log(e.target.checked)
        let nowCheckbox = e
        // let id = e.target.id;
        // document.getElementById('textoId').textContent = e.target.id
        document.querySelectorAll('.checkbox').forEach(item => {
            item.checked = false;
        })
        nowCheckbox.target.checked = true;
        let id = nowCheckbox.target.attributes.id.value;
        id = id.substr(8)
        // texto = nowCheckbox.target.attributes.id.value
        
        document.getElementById('paciente_id').value = id;
        
    }

</script>