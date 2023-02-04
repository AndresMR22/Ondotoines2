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

<input type="hidden" name="datos" id="datos" value="{{$datos}}">
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

            <input type="hidden" name="idTratamiento" id="idTratamiento" value="{{$idTratamiento}}">

            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body" style = "display:flex; flex-direction: row; justify-content:center; gap:40px;"  >

                            <div class="columna_izquierda" style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                                {{-- FILA 1 CI --}}
                                <div class="fila_ci my-1" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
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
                                                <div id="pos6"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos7"  class="estiloCubo"></div>
                                                <div id="pos8"  class="estiloCubo"></div>
                                                <div id="pos9"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos10"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente16">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos11"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos12"  class="estiloCubo"></div>
                                                <div id="pos13"  class="estiloCubo"></div>
                                                <div id="pos14"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos15"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente15">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos16"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos17"  class="estiloCubo"></div>
                                                <div id="pos18"  class="estiloCubo"></div>
                                                <div id="pos19"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos20"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente14">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos21"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos22"  class="estiloCubo"></div>
                                                <div id="pos23"  class="estiloCubo"></div>
                                                <div id="pos24"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos25"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente13">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos26"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos27"  class="estiloCubo"></div>
                                                <div id="pos28"  class="estiloCubo"></div>
                                                <div id="pos29"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos30"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente12">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos31"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos32"  class="estiloCubo"></div>
                                                <div id="pos33"  class="estiloCubo"></div>
                                                <div id="pos34"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos35"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caja fondoCubo" id="diente11">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos36"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos37"  class="estiloCubo"></div>
                                                <div id="pos38"  class="estiloCubo"></div>
                                                <div id="pos39"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos40"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- FILA 2 CI --}}
                                {{-- <div class="fila_ci my-2" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente55">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos6"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos7"  class="estiloCubo"></div>
                                                <div id="pos8"  class="estiloCubo"></div>
                                                <div id="pos9"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos10"  class="estiloCubo"></div>
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
                                </div> --}}

                                  {{-- FILA 3 CI --}}
                                  {{-- <div class="fila_ci my-2" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente85">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos11"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos12"  class="estiloCubo"></div>
                                                <div id="pos13"  class="estiloCubo"></div>
                                                <div id="pos14"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos15"  class="estiloCubo"></div>
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
                                </div> --}}

                                {{-- FILA 4 CI --}}
                                <div class="fila_ci" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente48">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos41"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos42"  class="estiloCubo"></div>
                                                <div id="pos43"  class="estiloCubo"></div>
                                                <div id="pos44"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos45"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente47">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos46"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos47"  class="estiloCubo"></div>
                                                <div id="pos48"  class="estiloCubo"></div>
                                                <div id="pos49"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos50"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente46">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos51"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos52"  class="estiloCubo"></div>
                                                <div id="pos53"  class="estiloCubo"></div>
                                                <div id="pos54"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos55"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente45">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos56"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos57"  class="estiloCubo"></div>
                                                <div id="pos58"  class="estiloCubo"></div>
                                                <div id="pos59"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos60"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente44">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos61"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos62"  class="estiloCubo"></div>
                                                <div id="pos63"  class="estiloCubo"></div>
                                                <div id="pos64"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos65"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente43">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos66"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos67"  class="estiloCubo"></div>
                                                <div id="pos68"  class="estiloCubo"></div>
                                                <div id="pos69"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos70"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente42">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos71"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos72"  class="estiloCubo"></div>
                                                <div id="pos73"  class="estiloCubo"></div>
                                                <div id="pos74"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos75"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente41">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos76"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos77"  class="estiloCubo"></div>
                                                <div id="pos78"  class="estiloCubo"></div>
                                                <div id="pos79"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos80"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- FIN COLUMNA IZQUIERDA --}}

                            <div class="columna_derecha" style="display:flex; flex-direction:column; justify-content:center;">

                                {{-- FILA 4 CD --}}
                                <div class="fila_cd my-1" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente31">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos81"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos82"  class="estiloCubo"></div>
                                                <div id="pos83"  class="estiloCubo"></div>
                                                <div id="pos84"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos85"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente32">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos86"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos87"  class="estiloCubo"></div>
                                                <div id="pos88"  class="estiloCubo"></div>
                                                <div id="pos89"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos90"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente33">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos91"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos92"  class="estiloCubo"></div>
                                                <div id="pos93"  class="estiloCubo"></div>
                                                <div id="pos94"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos95"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente34">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos96"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos97"  class="estiloCubo"></div>
                                                <div id="pos98"  class="estiloCubo"></div>
                                                <div id="pos99"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos100"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente35">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos101"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos102"  class="estiloCubo"></div>
                                                <div id="pos103"  class="estiloCubo"></div>
                                                <div id="pos104"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos105"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente36">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos106"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos107"  class="estiloCubo"></div>
                                                <div id="pos108"  class="estiloCubo"></div>
                                                <div id="pos109"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos110"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente37">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos111"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos112"  class="estiloCubo"></div>
                                                <div id="pos113"  class="estiloCubo"></div>
                                                <div id="pos114"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos115"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente38">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos116"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos117"  class="estiloCubo"></div>
                                                <div id="pos118"  class="estiloCubo"></div>
                                                <div id="pos119"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos120"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- FILA 2 CD --}}
                                <div class="fila_cd " style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                    <div class="caja fondoCubo" id="diente21">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos121"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos122"  class="estiloCubo"></div>
                                                <div id="pos123"  class="estiloCubo"></div>
                                                <div id="pos124"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos125"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente22">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos126"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos127"  class="estiloCubo"></div>
                                                <div id="pos128"  class="estiloCubo"></div>
                                                <div id="pos129"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos130"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente23">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos131"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos132"  class="estiloCubo"></div>
                                                <div id="pos133"  class="estiloCubo"></div>
                                                <div id="pos134"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos135"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente24">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos136"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos137"  class="estiloCubo"></div>
                                                <div id="pos138"  class="estiloCubo"></div>
                                                <div id="pos139"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos140"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente25">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos141"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos142"  class="estiloCubo"></div>
                                                <div id="pos143"  class="estiloCubo"></div>
                                                <div id="pos144"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos145"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente26">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos146"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos147"  class="estiloCubo"></div>
                                                <div id="pos148"  class="estiloCubo"></div>
                                                <div id="pos149"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos150"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente27">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos151"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos152"  class="estiloCubo"></div>
                                                <div id="pos153"  class="estiloCubo"></div>
                                                <div id="pos154"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos155"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="caja fondoCubo" id="diente28">
                                        <div class="contenedor">
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos156"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                            <div class="my-2"  style="display:flex; justify-content:center; gap:5px; ">
                                                <div id="pos157"  class="estiloCubo"></div>
                                                <div id="pos158"  class="estiloCubo"></div>
                                                <div id="pos159"  class="estiloCubo"></div>
                                            </div>
                                            <div  style="display:flex; justify-content:center; gap:5px; ">
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                                <div id="pos160"  class="estiloCubo"></div>
                                                <div  class="estiloCubo esconderEsquinas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- FILA 2 CD --}}
                                {{-- <div class="fila_cd my-2" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
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
        
                                </div> --}}

                                 {{-- FILA 3 CD --}}
                                {{-- <div class="fila_cd my-2" style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
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
        
                                </div> --}}

                                
                            </div>
                            {{-- FIN COLUMNA DERECHA --}}

                           
                        </div>
                        <div class="botones d-flex justify-content-center my-3">
                            <a onclick="guardarCambios();" title="Guardar cambios" class="btn btn-outline-success"><i class="fas fa-save"></i></a> 
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

    <form id="formulario">
        @csrf
    </form>

    <script>
        var arregloProcesos = []
        var idDiente = null, idCara = null; idCaraColor = null;
        var arrayAzules = ['1','3','7','8','9','10','14','15','17','19','20','21']
        function showOptions(e)
        {
            idDiente = e.target.parentNode.parentNode.parentNode.id
            idDiente = idDiente.substr(6);
            idCara = e.target.id;
            idCara = idCara.substr(3)
            idCaraColor = idCara;
            //caso 1: 
            if(idCara.length==1 && idCara>5)
            {
                let numero = idCara;
                if(numero==6){idCara=1}
                if(numero==7){idCara=2}
                if(numero==8){idCara=3}
                if(numero==9){idCara=4}
                if(numero==0){idCara=5}
            }
            //caso 2:
            if(idCara.length==2 && idCara.substr(1)<6 && idCara.substr(1)!=0)
            {
                idCara = idCara.substr(1);
            }
            //caso 3:
            if(idCara.length==2 && (idCara.substr(1)>5 || idCara.substr(1)==0))
            {
                let numero = idCara.substr(1)
                if(numero==6){idCara=1}
                if(numero==7){idCara=2}
                if(numero==8){idCara=3}
                if(numero==9){idCara=4}
                if(numero==0){idCara=5}
            }
            //caso 4:
            if(idCara.length==3 && idCara.substr(2)<6 && idCara.substr(2)!=0)
            {
                idCara = idCara.substr(2);
            }
            //caso 5:
            if(idCara.length==3 && (idCara.substr(2)>5 || idCara.substr(2)==0))
            {
                let numero = idCara.substr(2)
                if(numero==6){idCara=1}
                if(numero==7){idCara=2}
                if(numero==8){idCara=3}
                if(numero==9){idCara=4}
                if(numero==0){idCara=5}
            }
           
            
               
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
                document.getElementById('pos'+idCaraColor).style.backgroundColor="blue";
            }else
            {
                document.getElementById('pos'+idCaraColor).style.backgroundColor="red";
            }
          
            console.log('procesos:',arregloProcesos)
        }

        function guardarCambios()
        {
            $.ajax({
                        url: `{{ route('odontograma.store') }}`,
                        dataType: "json",
                        method:'POST',
                        data: {
                            procesos:arregloProcesos ,
                            _token:$('input[name="_token"]').val() , 
                            idTratamiento:document.getElementById('idTratamiento').value                        
                            }
                    }).done(function(res) {
                        alert('hola')
                        //    if(res==1)
						//    {
						// 	window.location.href = "/admin/tratamiento"
						//    }else
						//    {
						// 	alert('No se pudo actualizar el tratamiento')
						//    }
                        })
        }

   //  data-bs-toggle="modal" data-bs-target="#modalCrear"
   document.addEventListener('DOMContentLoaded',function()
   {
    let datos = JSON.parse(document.getElementById('datos').value)
        datos.forEach(item => {
            console.log(item)
           let cara =  document.getElementById('pos'+item.posicion_cara)
           cara.title = item.descripcion;
           if(cara!=undefined || cara!=null)
           {
            
            cara.style.backgroundColor=item.color;
           }
        })
        document.querySelectorAll('.estiloCubo').forEach((item,i) =>{
        // item.setAttribute('id',i)
        item.addEventListener('click',showOptions)
    })
        
   })
    </script>
@endsection
