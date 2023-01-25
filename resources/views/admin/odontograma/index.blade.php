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
                    <h1>Odontograma</h1>
                    <p class="breadcrumbs"><span><a href="">Dashboard</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Odontograma
                    </p>
                </div>
                <div>
                    <a href="{{ route('procedimiento.create') }}" class="btn btn-primary"> Agregar procedimiento</a>
                </div>
            </div>

            <style>
                .estiloCubo
                {
                    background-color:white; width:10px; height:10px; border-width: 2px; border-style: solid; border-color: black;
                }

                .esconderEsquinas
                {
                    visibility: hidden;
                }

                .fondoCubo
                {
                    width:60px; height:60px; background: #ABB2B9; display:flex; justify-content:center; align-items:center;
                }

                /* .opcionesOdontograma ul>li
                {
                 padding:10px 10px; background: #ABB2B9;
                 cursor: pointer;
                 margin:5px 0px;
                } */

                .fondoAzulOpcion
                {
                    padding:10px 10px; background: #1d6df7;  
                    cursor: pointer;
                    margin:5px 0px;
                    color:black;
                    font-weight: bold;
                    width: 100%;
                    text-align: center;
                }

                .fondoRojoOpcion
                {
                    padding:10px 10px; background: #d91a1a;
                    cursor: pointer;
                    margin:5px 0px;
                    color:black;
                    font-weight: bold;
                    width: 100%;
                    text-align: center;
                }

                /* .fondoVerdeOpcion
                {
                    padding:10px 10px; background: #7eee65;
                } */

            </style>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body" style = "display:flex; flex-direction: row; justify-content:center; gap:40px;"  >

                            <div class="columna_izquierda" style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                                {{-- FILA 1 CI --}}
                                <div class="fila_ci" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente18">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente17">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente16">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente15">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente14">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente13">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente12">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente11">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- FILA 2 CI --}}
                                <div class="fila_ci my-2" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente55">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente54">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente53">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente52">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente51">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                  {{-- FILA 3 CI --}}
                                  <div class="fila_ci my-2" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente85">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente84">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente83">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente82">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente81">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- FILA 4 CI --}}
                                <div class="fila_ci" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente48">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente47">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente46">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente45">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente44">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente43">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente42">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente41">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- FIN COLUMNA IZQUIERDA --}}

                            <div class="columna_derecha" style="display:flex; flex-direction:column; justify-content:center;">
                                {{-- FILA 1 CD --}}
                                <div class="fila_cd" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente21">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente22">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente23">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente24">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente25">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente26">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente27">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente28">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- FILA 2 CD --}}
                                <div class="fila_cd my-2" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente61">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente62">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente63">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente64">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente65">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                </div>

                                 {{-- FILA 3 CD --}}
                                 <div class="fila_cd my-2" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente71">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente72">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente73">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente74">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente75">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                </div>

                                {{-- FILA 4 CD --}}
                                <div class="fila_cd" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente31">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente32">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente33">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente34">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente35">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente36">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente37">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente38">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos1"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos2"  class="estiloCubo"></div>
                                                <div id="pos3"  class="estiloCubo"></div>
                                                <div id="pos4"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos5"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- FIN COLUMNA DERECHA --}}
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->


     {{-- MODAL OPCIONES ODONTOGRAMA --}}
     <div class="modal fade modal-add-contact" id="modalOpciones" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">OPCIONES</h5>
                    </div>

                    <div class="modal-body px-4">


                       <div class="opcionesOdontograma">
                        <div class="contenedor" style="display:flex; justify-content:center; gap:20px;">
                            <ul style="display:flex; flex-direction:column; justify-content:center; align-items:center; width:70px;">
                                <li ondblclick="asignarReferencia(1)" class="fondoAzulOpcion" title="diente obturado">Do</li>
                                <li ondblclick="asignarReferencia(2)" class="fondoRojoOpcion" title="cariado">C</li>
                                <li ondblclick="asignarReferencia(3)" class="fondoAzulOpcion" title="ausente">=</li>
                                <li ondblclick="asignarReferencia(4)" class="fondoRojoOpcion" title="exodoncia">X</li>
                                <li ondblclick="asignarReferencia(5)" class="fondoRojoOpcion" title="caries penetrante">CP</li>
                                <li ondblclick="asignarReferencia(6)" class="fondoRojoOpcion" title="retenido">M</li>
                                <li ondblclick="asignarReferencia(7)" class="fondoAzulOpcion" title="pieza de puente">PP</li>
                            </ul>
    
                            <ul style="display:flex; flex-direction:column; justify-content:center; align-items:center; width:70px;">
                                <li ondblclick="asignarReferencia(8)" class="fondoAzulOpcion" title="Corona">Co</li>
                                <li ondblclick="asignarReferencia(9)" class="fondoAzulOpcion" title="Protesis removible">Pr</li>
                                <li ondblclick="asignarReferencia(10)" class="fondoAzulOpcion" title="Incrustación">Inc</li>
                                <li ondblclick="asignarReferencia(11)" class="fondoRojoOpcion" title="Enfermedad periododental">EP</li>
                                <li ondblclick="asignarReferencia(12)" class="fondoRojoOpcion" title="Fractura dentaria">FD</li>
                                <li ondblclick="asignarReferencia(13)" class="fondoRojoOpcion" title="Mala posición dentaria">MPD</li>
                                <li ondblclick="asignarReferencia(14)" class="fondoAzulOpcion" title="Perno muñon">PM</li>
                            </ul>

                            <ul style="display:flex; flex-direction:column; justify-content:center; align-items:center; width:70px;">
                                <li ondblclick="asignarReferencia(15)" class="fondoAzulOpcion" title="Tratamiento de CLO">TC</li>
                                <li ondblclick="asignarReferencia(16)" class="fondoRojoOpcion" title="Fluoresis">F</li>
                                <li ondblclick="asignarReferencia(17)" class="fondoAzulOpcion" title="Implante dental">Imp</li>
                                <li ondblclick="asignarReferencia(18)" class="fondoRojoOpcion" title="Mancha blanca">MB</li>
                                <li ondblclick="asignarReferencia(19)" class="fondoAzulOpcion" title="Sellador">Sc</li>
                                <li ondblclick="asignarReferencia(20)" class="fondoAzulOpcion" title="Surco profundo">SP SR</li>
                                <li ondblclick="asignarReferencia(21)" class="fondoAzulOpcion" title="Hipoplasia de esmalte">Hp</li>
                            </ul>

                            
                        </div>

                       </div>

                        
                    </div>

                    {{-- <div class="modal-footer px-4">
                        <button type="submit" class="btn btn-primary btn-pill">Guardar cambios</button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

    <script>
        var arregloProcesos = []
        var idDiente = null, idCara = null;
        var arrayAzules = ['1','3','7','8','9','10','14','15','17','19','20','21']
        function showOptions(e)
        {
            idDiente = e.target.parentNode.parentNode.parentNode.id
            idDiente = idDiente.substr(6);
            idCara = e.target.id;
            idCara = idCara.substr(3)
            console.log(idCara,idDiente)
            $(".modal-add-contact").modal("show");
        }

        function asignarReferencia(idReferencia)
        {
            let band = false;
            let data = 
            {
                'idDiente':idDiente,
                'idCara':idCara,
                'idReferencia':idReferencia
            }
            arregloProcesos.push(data)
            for(let i = 0 ; i<arrayAzules.length; i++)
            {
                if(arrayAzules[i]==idReferencia)
                {
                    band = true;
                }
            }
            if(band)
            {
                document.getElementById('pos'+idCara).style.backgroundColor="blue";
            }else
            {
                document.getElementById('pos'+idCara).style.backgroundColor="red";
            }
          
            console.log('procesos:',arregloProcesos)
        }

   //  data-bs-toggle="modal" data-bs-target="#modalCrear"
   document.addEventListener('DOMContentLoaded',function()
   {
        document.querySelectorAll('.estiloCubo').forEach((item,i) =>{
        // item.setAttribute('id',i)
        item.addEventListener('click',showOptions)
    })
        
   })
    </script>
@endsection
