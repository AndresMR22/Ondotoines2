@extends('admin.dashboard')
@section('contenido')

    @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
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

            <!-- CITAS POR PACIENTE -->
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-center">
                <div>
                    <h1>Odontograma</h1>
                </div>
            </div>
            <div class="content">
                <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                    <div>
                        <h1>Odontograma</h1>
                        <p class="breadcrumbs"><span><a href="">Dashboard</a></span>
                            <span><i class="mdi mdi-chevron-right"></i></span>Odontograma
                        </p>
                    </div>

                </div>

                <style>
                    .estiloCubo {
                        background-color: white;
                        width: 10px;
                        height: 10px;
                        border-width: 2px;
                        border-style: solid;
                        border-color: black;
                    }

                    .esconderEsquinas {
                        visibility: hidden;
                    }

                    .fondoCubo {
                        width: 60px;
                        height: 60px;
                        background: #ABB2B9;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }

                    /* .opcionesOdontograma ul>li
                        {
                         padding:10px 10px; background: #ABB2B9;
                         cursor: pointer;
                         margin:5px 0px;
                        } */

                    .fondoAzulOpcion {
                        padding: 10px 10px;
                        background: #1d6df7;
                        cursor: pointer;
                        margin: 5px 0px;
                        color: black;
                        font-weight: bold;
                        width: 100%;
                        text-align: center;
                    }

                    .fondoRojoOpcion {
                        padding: 10px 10px;
                        background: #d91a1a;
                        cursor: pointer;
                        margin: 5px 0px;
                        color: black;
                        font-weight: bold;
                        width: 100%;
                        text-align: center;
                    }

                    /* .fondoVerdeOpcion
                        {
                            padding:10px 10px; background: #7eee65;
                        } */
                </style>

                {{-- <input type="hidden" name="idTratamiento" id="idTratamiento" value="{{ $idTratamiento }}"> --}}

                <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <div class="card-body"
                                style="display:flex; flex-direction: row; justify-content:center; gap:40px;">

                                <div class="columna_izquierda"
                                    style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                                    {{-- FILA 1 CI --}}
                                    <div class="fila_ci my-1"
                                        style="display:flex; flex-direction:row; justify-content:center; gap:10px;">

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>8</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente18">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos1" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos2" class="estiloCubo"></div>
                                                            <div id="pos3" class="estiloCubo"></div>
                                                            <div id="pos4" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos5" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>7</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente17">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos6" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos7" class="estiloCubo"></div>
                                                            <div id="pos8" class="estiloCubo"></div>
                                                            <div id="pos9" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos10" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>6</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente16">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos11" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos12" class="estiloCubo"></div>
                                                            <div id="pos13" class="estiloCubo"></div>
                                                            <div id="pos14" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos15" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>5</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente15">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos16" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos17" class="estiloCubo"></div>
                                                            <div id="pos18" class="estiloCubo"></div>
                                                            <div id="pos19" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos20" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>4</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente14">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos21" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos22" class="estiloCubo"></div>
                                                            <div id="pos23" class="estiloCubo"></div>
                                                            <div id="pos24" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos25" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>3</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente13">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos26" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos27" class="estiloCubo"></div>
                                                            <div id="pos28" class="estiloCubo"></div>
                                                            <div id="pos29" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos30" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>2</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente12">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos31" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos32" class="estiloCubo"></div>
                                                            <div id="pos33" class="estiloCubo"></div>
                                                            <div id="pos34" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos35" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>1</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente11">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos36" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos37" class="estiloCubo"></div>
                                                            <div id="pos38" class="estiloCubo"></div>
                                                            <div id="pos39" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos40" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- FILA 4 CI --}}
                                    <div class="fila_ci"
                                        style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>8</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente48">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos41" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos42" class="estiloCubo"></div>
                                                            <div id="pos43" class="estiloCubo"></div>
                                                            <div id="pos44" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos45" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>7</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente47">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos46" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos47" class="estiloCubo"></div>
                                                            <div id="pos48" class="estiloCubo"></div>
                                                            <div id="pos49" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos50" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>6</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente46">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos51" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos52" class="estiloCubo"></div>
                                                            <div id="pos53" class="estiloCubo"></div>
                                                            <div id="pos54" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos55" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>5</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente45">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos56" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos57" class="estiloCubo"></div>
                                                            <div id="pos58" class="estiloCubo"></div>
                                                            <div id="pos59" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos60" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>4</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente44">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos61" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos62" class="estiloCubo"></div>
                                                            <div id="pos63" class="estiloCubo"></div>
                                                            <div id="pos64" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos65" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>3</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente43">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos66" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos67" class="estiloCubo"></div>
                                                            <div id="pos68" class="estiloCubo"></div>
                                                            <div id="pos69" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos70" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>2</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente42">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos71" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos72" class="estiloCubo"></div>
                                                            <div id="pos73" class="estiloCubo"></div>
                                                            <div id="pos74" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos75" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>1</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente41">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos76" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos77" class="estiloCubo"></div>
                                                            <div id="pos78" class="estiloCubo"></div>
                                                            <div id="pos79" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos80" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- FIN COLUMNA IZQUIERDA --}}

                                <div class="columna_derecha"
                                    style="display:flex; flex-direction:column; justify-content:center;">

                                    {{-- FILA 4 CD --}}
                                    <div class="fila_cd my-1"
                                        style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>1</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente31">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos81" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos82" class="estiloCubo"></div>
                                                            <div id="pos83" class="estiloCubo"></div>
                                                            <div id="pos84" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos85" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>2</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente32">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos86" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos87" class="estiloCubo"></div>
                                                            <div id="pos88" class="estiloCubo"></div>
                                                            <div id="pos89" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos90" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>3</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente33">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos91" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos92" class="estiloCubo"></div>
                                                            <div id="pos93" class="estiloCubo"></div>
                                                            <div id="pos94" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos95" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>4</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente34">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos96" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos97" class="estiloCubo"></div>
                                                            <div id="pos98" class="estiloCubo"></div>
                                                            <div id="pos99" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos100" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>5</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente35">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos101" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos102" class="estiloCubo"></div>
                                                            <div id="pos103" class="estiloCubo"></div>
                                                            <div id="pos104" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos105" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>6</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente36">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos106" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos107" class="estiloCubo"></div>
                                                            <div id="pos108" class="estiloCubo"></div>
                                                            <div id="pos109" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos110" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>7</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente37">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos111" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos112" class="estiloCubo"></div>
                                                            <div id="pos113" class="estiloCubo"></div>
                                                            <div id="pos114" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos115" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>8</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente38">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos116" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos117" class="estiloCubo"></div>
                                                            <div id="pos118" class="estiloCubo"></div>
                                                            <div id="pos119" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos120" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- FILA 2 CD --}}
                                    <div class="fila_cd "
                                        style="display:flex; flex-direction:row; justify-content:center; gap:10px;">
                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>1</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente21">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos121" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos122" class="estiloCubo"></div>
                                                            <div id="pos123" class="estiloCubo"></div>
                                                            <div id="pos124" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos125" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>2</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente22">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos126" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos127" class="estiloCubo"></div>
                                                            <div id="pos128" class="estiloCubo"></div>
                                                            <div id="pos129" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos130" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>3</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente23">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos131" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos132" class="estiloCubo"></div>
                                                            <div id="pos133" class="estiloCubo"></div>
                                                            <div id="pos134" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos135" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>4</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente24">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos136" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos137" class="estiloCubo"></div>
                                                            <div id="pos138" class="estiloCubo"></div>
                                                            <div id="pos139" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos140" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>5</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente25">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos141" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos142" class="estiloCubo"></div>
                                                            <div id="pos143" class="estiloCubo"></div>
                                                            <div id="pos144" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos145" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>6</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente26">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos146" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos147" class="estiloCubo"></div>
                                                            <div id="pos148" class="estiloCubo"></div>
                                                            <div id="pos149" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos150" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>7</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente27">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos151" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos152" class="estiloCubo"></div>
                                                            <div id="pos153" class="estiloCubo"></div>
                                                            <div id="pos154" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos155" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="contenedorDienteNumero"
                                            style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                                            <div class="numeroDiente">
                                                <h5>8</h5>
                                            </div>
                                            <div class="diente">
                                                <div class="caja fondoCubo" id="diente28">
                                                    <div class="contenedor">
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos156" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                        <div class="my-2"
                                                            style="display:flex; justify-content:center; gap:5px; ">
                                                            <div id="pos157" class="estiloCubo"></div>
                                                            <div id="pos158" class="estiloCubo"></div>
                                                            <div id="pos159" class="estiloCubo"></div>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; gap:5px; ">
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                            <div id="pos160" class="estiloCubo"></div>
                                                            <div class="estiloCubo esconderEsquinas"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FIN COLUMNA DERECHA --}}


                            </div>
                            <div class="botones d-flex justify-content-center my-3">
                                <a onclick="guardarCambios();" title="Guardar cambios" class="btn btn-outline-success"><i
                                        class="fas fa-save"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Content -->


            <!-- CITAS POR PACIENTE -->
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-center">
                <div>
                    <h1>Citas</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Medico</th>
                                            <th>Especialidad</th>
                                            <th>Fecha inicio</th>
                                            <th>Fecha fin</th>
                                            <th>Teléfono</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($citas as $cita)
                                            <tr>
                                                <td>{{ $cita->medico }}</td>
                                                <td>{{ $cita->especialidad }}</td>
                                                <td>{{ $cita->fecha_inicio }}</td>
                                                <td>{{ $cita->fecha_fin }}</td>
                                                <td>{{ $cita->telefono }}</td>
                                                <td>{{ $cita->estado }}</td>
                                                <td>
                                                    <div class="btn-group mb-1">
                                                        <button type="button"
                                                            class="btn btn-outline-success">Info</button>
                                                        <button type="button"
                                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static">
                                                            <span class="sr-only">Info</span>
                                                        </button>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#modalEditarCita{{ $cita->id }}">Editar</a>
                                                            <a class="dropdown-item"
                                                                onclick="eliminarCita({{ $cita->id }});">Eliminar</a>
                                                        </div>
                                                    </div>
                                                    <form id="formEliminarCita{{ $cita->id }}" method="POST"
                                                        action="{{ route('cita.destroy', $cita->id) }}">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade modal-add-contact"
                                                id="modalEditarCita{{ $cita->id }}" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST" id="formEditarCita{{ $cita->id }}"
                                                            action="{{ route('cita.update', $cita->id) }}">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="modal-header px-4">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                    Editar
                                                                    Cita</h5>
                                                            </div>

                                                            <div class="modal-body px-4">
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Medico</label>
                                                                            <input type="text" class="form-control"
                                                                                name="medico" id="medico"
                                                                                value="{{ $cita->medico }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Especialidad</label>
                                                                            <input type="text" class="form-control"
                                                                                name="especialidad" id="especialidad"
                                                                                value="{{ $cita->especialidad }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Estado</label>
                                                                            <select name="estado" id="estado"
                                                                                class="form-select" required>
                                                                                <option value="pendiente"
                                                                                    {{ $cita->estado == 'pendiente' ? 'selected' : '' }}>
                                                                                    Pendiente</option>
                                                                                <option value="atendido"
                                                                                    {{ $cita->estado != 'pendiente' ? 'selected' : '' }}>
                                                                                    Atendido</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Teléfono</label>
                                                                            <input type="tel" class="form-control"
                                                                                name="telefono" required id="telefono"
                                                                                value="{{ $cita->telefono }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Fecha Inicio</label>
                                                                            <input type="datetime-local" required
                                                                                class="form-control" name="fecha_inicio"
                                                                                id="fecha_inicioEditar{{ $cita->id }}"
                                                                                value="{{ $cita->fecha_inicio }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Fecha Fin</label>
                                                                            <input type="datetime-local" required
                                                                                class="form-control" name="fecha_fin"
                                                                                id="fecha_finEditar{{ $cita->id }}"
                                                                                value="{{ $cita->fecha_fin }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer px-4">
                                                                <button type="button" class="btn btn-secondary btn-pill"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <a onclick="guardarCambios({{ $cita->id }});"
                                                                    class="btn btn-primary btn-pill">Guardar cambios</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TRATAMIENTOS POR PACIENTE -->
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-center my-5">
                <div>
                    <h1 class="text-center">Tratamientos</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table2" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Medico</th>
                                            <th>Especialidad</th>
                                            {{-- <th>Asunto</th> --}}
                                            <th>Observación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tratamientos as $key => $tra)
                                            <tr>
                                                <td>{{ $tra->medico }}</td>
                                                <td>{{ $tra->especialidad }}</td>
                                                {{-- <td>{{ $tra->asunto }}</td> --}}
                                                <td>{{ $tra->observacion }}</td>
                                                <td>
                                                    <div class="btn-group mb-1">
                                                        <button type="button"
                                                            class="btn btn-outline-success">Info</button>
                                                        <button type="button"
                                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static">
                                                            <span class="sr-only">Info</span>
                                                        </button>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#modalProcedimientos{{ $key }}">Procedimientos</a>
                                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#modalEditarTratamiento{{ $tra->id }}">Editar</a>
                                                            <a class="dropdown-item"
                                                                onclick="eliminarTratamiento({{ $tra->id }})">Eliminar</a>
                                                        </div>
                                                    </div>
                                                    <form id="formEliminarTratamiento{{ $tra->id }}" method="POST"
                                                        action="{{ route('tratamiento.destroy', $tra->id) }}">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade modal-add-contact"
                                                id="modalEditarTratamiento{{ $tra->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST"
                                                            action="{{ route('tratamiento.update', $tra->id) }}">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="modal-header px-4">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                    Editar Tratamiento</h5>
                                                            </div>

                                                            <div class="modal-body px-4">
                                                                <div class="row mb-2">
                                                                    {{-- <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Asunto</label>
                                                                            <input type="text" class="form-control"
                                                                                name="asunto" id="asunto"
                                                                                value="{{ $tra->asunto }}">
                                                                        </div>
                                                                    </div> --}}
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Medico</label>
                                                                            <input type="text" class="form-control"
                                                                                name="medico" id="medico"
                                                                                value="{{ $tra->medico }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Especialidad</label>
                                                                            <input type="text" class="form-control"
                                                                                name="especialidad" id="especialidad"
                                                                                value="{{ $tra->especialidad }}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-2">

                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="firstName">Observación</label>
                                                                            <textarea class="form-control" name="observacion">{{ $tra->observacion }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer px-4">
                                                                <button type="button"
                                                                    class="btn btn-secondary btn-pill"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-pill">Guardar
                                                                    cambios</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade modal-add-contact"
                                                id="modalProcedimientos{{ $key }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                    role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-header px-4 d-flex justify-content-between">
                                                            <div>
                                                                <h5 class="modal-title text-center"
                                                                    id="exampleModalCenterTitle">Información del
                                                                    tratamiento</h5>
                                                            </div>
                                                            <div>
                                                                <button type="button"
                                                                    class="btn btn-secondary btn-pill"
                                                                    data-bs-dismiss="modal">X</button>
                                                            </div>
                                                        </div>

                                                        <div class="modal-body px-4">
                                                            <div class="row-100 d-flex flex-direction-row">
                                                                <div class="col-6">
                                                                    <div class="procedimientos text-center">Procedimientos
                                                                    </div>
                                                                    <div class="titulos d-flex justify-content-around ">
                                                                        <div class="titulo">Nombre</div>
                                                                        <div class="titulo">Cantidad</div>
                                                                        <div class="titulo">Precio</div>
                                                                    </div>
                                                                    @foreach ($tra->procedimientos as $clave => $pro)
                                                                        <div
                                                                            class="contenidos d-flex justify-content-around ">
                                                                            <div class="contenido">{{ $pro->nombre }}
                                                                            </div>
                                                                            <div class="contenido">{{ $pro->cantidad }}
                                                                            </div>
                                                                            <div class="contenido">{{ $pro->precio }}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="paciente text-center">Paciente</div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6">Nombres:</div>
                                                                        <div class="col-6">{{ $tra->paciente->nombre }}
                                                                            {{ $tra->paciente->apellido }} </div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6">Cedula:</div>
                                                                        <div class="col-6">{{ $tra->paciente->cedula }}
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6">Ocupación:</div>
                                                                        <div class="col-6">
                                                                            {{ $tra->paciente->ocupacion }}</div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6">Teléfono:</div>
                                                                        <div class="col-6">
                                                                            {{ $tra->paciente->telefono }}
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="row infoPaciente d-flex justify-content-center">
                                                                        <div class="col-6">Edad:</div>
                                                                        <div class="col-6">{{ $tra->paciente->edad }}
                                                                            años</div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
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


    {{-- MODAL CREAR ADMIN --}}
    <div class="modal fade modal-add-contact" id="modalCrear" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Crear Administrador</h5>
                    </div>

                    <div class="modal-body px-4">


                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">Nombre</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">Correo</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer px-4">
                        {{-- <button type="button" class="btn btn-secondary btn-pill"
                                        data-bs-dismiss="modal">Cancelar</button> --}}
                        <button type="submit" class="btn btn-primary btn-pill">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function eliminarTratamiento(id) {
            let form = document.getElementById('formEliminarTratamiento' + id);
            form.submit();
        }

        function eliminarCita(idCita) {
            let form = document.getElementById('formEliminarCita' + idCita);
            form.submit();
        }

        function guardarCambios(idForm) {
            let form = document.getElementById('formEditarCita' + idForm)
            form.submit();
        }
    </script>
@endsection
