@extends('admin.dashboard')
@section('contenido')
<div class="ec-content-wrapper">
    <div class="content">
        <!-- Top Statistics -->
        <div class="row">
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-1">
                    <div class="card-body">
                        <h2 class="mb-1">{{count($pacientes)}}</h2>
                        <p>Pacientes</p>
                        <span class="mdi mdi-account-arrow-left"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">{{count($citas)}}</h2>
                        <p>Citas</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-3">
                    <div class="card-body">
                        <h2 class="mb-1">{{ auth()->user()->unreadNotifications->count() }}</h2>
                        <p>Notificaciones pendientes</p>
                        <span class="mdi mdi-bell"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-4">
                    <div class="card-body">
                        <h2 class="mb-1">{{count($admins)}}</h2>
                        <p>Admins</p>
                        <span class="mdi mdi-account-key"></span>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="tratamientos" id="tratamientos" value="{{$tratamientos}}">
        <input type="hidden" name="numerosTratamiento" id="numerosTratamiento" value="{{$numerosTratamiento}}">
         <input type="hidden" name="observaciones" id="observaciones" value="{{$observaciones}}">

        <div class="row">
            {{-- <div class="col-xl-8 col-md-12 p-b-15">
                <!-- User activity statistics -->
                <div class="card card-default" id="user-activity">
                    <div class="no-gutters">
                        <div>
                            <div class="card-header justify-content-between">
                                <h2>User Activity</h2>
                                <div class="date-range-report ">
                                    <span></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="userActivityContent"> 
                                    <div class="tab-pane fade show active" id="user" role="tabpanel">
                                        <canvas id="activity" class="chartjs"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex flex-wrap bg-white border-top">
                                <a href="#" class="text-uppercase py-3">In-Detail Overview</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-12 col-md-12 p-b-15">
                <div class="card card-default">
                    <div class="card-header flex-column align-items-start">
                        <h2>Costo de tratamientos realizados ($)</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="currentUser" class="chartjs"></canvas>
                    </div>
                    {{-- <div class="card-footer d-flex flex-wrap bg-white border-top">
                        <a href="#" class="text-uppercase py-3">In-Detail Overview</a>
                    </div> --}}
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-xl-8 col-12 p-b-15">
                <!-- World Chart -->
                <div class="card card-default" id="analytics-country">
                    <div class="card-header justify-content-between">
                        <h2>Purchased by Country</h2>
                        <div class="date-range-report ">
                            <span></span>
                        </div>
                    </div>
                    <div class="card-body vector-map-world-2">
                        <div id="regions_purchase" style="height: 100%; width: 100%;"></div>
                    </div>
                    <div class="border-top mt-3">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="world-data-chart border-bottom pt-15px pb-15px">
                                    <canvas id="hbar1" class="chartjs"></canvas>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="world-data-chart pt-15px pb-15px">
                                    <canvas id="hbar2" class="chartjs"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex flex-wrap bg-white">
                        <a href="#" class="text-uppercase py-3">In-Detail Overview</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-12 p-b-15">
                <!-- Top Sell Table -->
                <div class="card card-default Sold-card-table">
                    <div class="card-header justify-content-between">
                        <h2>Sold by Items</h2>
                        <div class="tools">
                            <button class="text-black-50 mr-2 font-size-20"><i
                                    class="mdi mdi-cached"></i></button>
                            <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                    id="dropdown-units" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" data-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item"><a href="#">Action</a></li>
                                    <li class="dropdown-item"><a href="#">Another action</a></li>
                                    <li class="dropdown-item"><a href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0 compact-units" data-simplebar style="height: 534px;">
                        <table class="table ">
                            <tbody>
                                <tr>
                                    <td class="text-dark">Backpack</td>
                                    <td class="text-center">9</td>
                                    <td class="text-right">33% <i
                                            class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark">T-Shirt</td>
                                    <td class="text-center">6</td>
                                    <td class="text-right">150% <i
                                            class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark">Coat</td>
                                    <td class="text-center">3</td>
                                    <td class="text-right">50% <i
                                            class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark">Necklace</td>
                                    <td class="text-center">7</td>
                                    <td class="text-right">150% <i
                                            class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark">Jeans Pant</td>
                                    <td class="text-center">10</td>
                                    <td class="text-right">300% <i
                                            class="mdi mdi-arrow-down-bold text-danger pl-1 font-size-12"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark">Shoes</td>
                                    <td class="text-center">5</td>
                                    <td class="text-right">100% <i
                                            class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark">T-Shirt</td>
                                    <td class="text-center">6</td>
                                    <td class="text-right">150% <i
                                            class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark">Watches</td>
                                    <td class="text-center">18</td>
                                    <td class="text-right">160% <i
                                            class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark">Inner</td>
                                    <td class="text-center">156</td>
                                    <td class="text-right">120% <i
                                            class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark">T-Shirt</td>
                                    <td class="text-center">6</td>
                                    <td class="text-right">150% <i
                                            class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer d-flex flex-wrap bg-white">
                        <a href="#" class="text-uppercase py-3">View Report</a>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-12 p-b-15">
                <!-- Recent Order Table -->
                <div class="card card-table-border-none card-default recent-orders" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <h2>Tratamientos recientes</h2>
                        {{-- <div class="date-range-report">
                            <span></span>
                        </div> --}}
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table card-table table-responsive table-responsive-large"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th class="d-none d-lg-table-cell">Procedimientos</th>
                                    <th class="d-none d-lg-table-cell">Paciente</th>
                                    <th class="d-none d-lg-table-cell">Costo</th>
                                    {{-- <th>Status</th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tratamientosRecientes as $key => $tra)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <a class="text-dark" href="">{{$tra->observacion}}</a>
                                    </td>
                                    <td class="d-none d-lg-table-cell"><a data-bs-toggle="modal" data-bs-target="#modal-add-member{{$key}}" class="btn btn-info" title="Ver procedimientos"><i class="mdi mdi-table-column-plus-after"></i></a></td>
                                    <td class="d-none d-lg-table-cell">{{$tra->paciente->nombre}}</td>
                                    <td class="d-none d-lg-table-cell">${{$tra->costoTratamiento}}</td>
                                    {{-- <td>
                                        <span class="badge badge-success">Completed</span>
                                    </td> --}}
                                    {{-- <td class="text-right">
                                        <div class="dropdown show d-inline-block widget-dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href=""
                                                role="button" id="dropdown-recent-order1"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static"></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-item">
                                                    <a href="#">View</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td> --}}
                                </tr>

                                <div class="modal fade" id="modal-add-member{{$key}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            {{-- <form class="modal-header border-bottom-0">
                                                <input type="text" class="form-control" placeholder="Search...">
                                            </form> --}}
            
                                            <div class="modal-body p-0" data-simplebar style="height:320px">
                                                <ul class="list-unstyled border-top mb-0">
                                                    @foreach($tra->procedimientos as $pro)
                                                    <li>
                                                        <div class="media media-message">
                                                            <div class="position-relative mr-3">
                                                                @if(isset($pro->imagen->url))
                                                                <img class="rounded-circle" src="{{$pro->imagen->url}}"
                                                                    alt="Image">
                                                                    @else
                                                                    <img  class="rounded-circle" src="assets/img/brand/1.jpg"
                                                                    alt="Image">
                                                                    @endif

                                                                <span class="status away"></span>
                                                            </div>
                                                            <div class="media-body d-flex justify-content-between align-items-center">
                                                                <div class="message-contents">
                                                                    <h4 class="title">{{$pro->nombre}}</h4>
                                                                    <p class="last-msg">Costo: {{$pro->precio}}.</p>
                                                                </div>
            
                                                                {{-- <div class="control outlined control-checkbox checkbox-primary">
                                                                    <input type="checkbox" checked="checked">
                                                                    <div class="control-indicator"></div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
            
                                            {{-- <div class="modal-footer px-4">
                                                <button type="button" class="btn btn-secondary btn-pill"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary btn-pill">Add new member</button>
                                            </div> --}}
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

        <div class="row">
            <div class="col-xl-5">
                <!-- New Customers -->
                <div class="card ec-cust-card card-table-border-none card-default">
                    <div class="card-header justify-content-between ">
                        <h2>Pacientes recientes</h2>
                        <div>
                            {{-- <button class="text-black-50 mr-2 font-size-20">
                                <i class="mdi mdi-cached"></i>
                            </button> --}}
                            <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="{{route('admin.dashboard')}}" role="button"
                                    id="dropdown-customar" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" data-display="static">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item"><a href="{{route('paciente.create')}}">Agregar</a></li>
                                    <li class="dropdown-item"><a href="{{route('paciente.index')}}">Ver todos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-15px">
                        <table class="table ">
                            <tbody>
                                @foreach($pacientes as $paciente)
                                <tr>
                                    <td>
                                        <div class="media">
                                            {{-- <div class="media-image mr-3 rounded-circle">
                                                <a href="profile.html"><img
                                                        class="profile-img rounded-circle w-45"
                                                        src="assets/img/user/u1.jpg"
                                                        alt="customer image"></a>
                                            </div> --}}
                                            <div class="media-body align-self-center">
                                                <a href="profile.html">
                                                    <h6 class="mt-0 text-dark font-weight-medium">{{$paciente->nombre}} {{$paciente->apellido}}</h6>
                                                </a>
                                                <small>{{$paciente->correo}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$paciente->telefono}}</td>
                                    {{-- <td class="text-dark d-none d-md-block">$150</td> --}}
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-7">
                <!-- Top Products -->
                <div class="card card-default ec-card-top-prod">
                    <div class="card-header justify-content-between">
                        <h2>Procedimientos</h2>
                        <div>
                            {{-- <button class="text-black-50 mr-2 font-size-20"><i
                                    class="mdi mdi-cached"></i></button> --}}
                            <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                    id="dropdown-product" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" data-display="static">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item"><a href="{{route('procedimiento.create')}}">Agregar</a></li>
                                    <li class="dropdown-item"><a href="{{route('procedimiento.index')}}">Ver todos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-10px mb-10px py-0">
                        @foreach($procedimientos as $pro)
                        <div class="row media d-flex pt-15px pb-15px">
                            <div
                                class="col-lg-3 col-md-3 col-2 media-image align-self-center rounded">
                                <a href="#"><img style="max-width: 60px;"  src="assets/img/products/p1.jpg" alt="customer image"></a>
                            </div>
                            <div class="col-lg-9 col-md-9 col-10 media-body align-self-center ec-pos">
                                <a href="#">
                                    <h6 class="mb-10px text-dark font-weight-medium">{{$pro->nombre}}</h6>
                                </a>
                                <p class="float-md-right sale"><span class="mr-2">${{$pro->precio}}</span> dolares</p>
                                <p class="d-none d-md-block"></p>
                                {{-- <p class="mb-0 ec-price">
                                    <span class="text-dark">$520</span>
                                    <del>$580</del>
                                </p> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Content -->
</div> <!-- End Content Wrapper -->
@endsection