<!DOCTYPE html>
<html lang="es">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/vendors/iconfonts/font-awesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('home')}}"><img src="{{asset('images/logo/logoAlexa.png')}}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img src="{{asset('images/logo/isotipoAlexa.png')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">
         
        </ul>
        <ul class="navbar-nav navbar-nav-right">
       
        
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="fas fa-shopping-cart mx-0"></i>
              <span class="count">{{count($shopping_cart->shopping_cart_details)}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
             @foreach($shopping_cart->shopping_cart_details as $shopping_cart_detail)
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-danger">
                   <img src="{{$shopping_cart_detail->producto->images->pluck('url')[0]}}">
                   {{-- <a><i class="fas fa-times"></i></a>  --}}
                  </div>
                 
                </div>
                <div class="preview-item-content" style="display:flex; justify-content:space-evenly;">
                  <div>
                    <h6 class="preview-subject font-weight-medium">{{$shopping_cart_detail->producto->nombre}}</h6>
                    <p class="font-weight-light small-text">
                      {{$shopping_cart_detail->precio}}x{{$shopping_cart_detail->cantidad}}
                    </p>
                  </div>
                  <div>
                    <a href="{{route('shoppingCartDetail.retirar',$shopping_cart_detail)}}"><i class="fas fa-times"></i></a>
                  </div>
                
                </div>
                {{-- <div class="preview-thumbnail"> --}}
              
                {{-- </div> --}}

                
              </a>
              
              <div class="dropdown-divider"></div>
              @endforeach
              {{-- <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="fas fa-wrench mx-0"></i>
                  </div>
                </div>
              
              </a> --}}
             
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-envelope mx-0"></i>
              <span class="count">25</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{asset('images/logo/admin.png')}}" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              {{-- <a class="dropdown-item">
                <i class="fas fa-cog text-primary"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div> --}}
              <a class="dropdown-item">
                <i class="fas fa-power-off text-primary"></i>
                Cerrar sesión
              </a>
            </div>
          </li>
       
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close fa fa-times"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
   
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="{{asset('images/logo/admin.png')}}" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                  Bienvenido
                </p>
                <p class="designation">
                  {{auth()->user()->name}}
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts3" aria-expanded="false" aria-controls="page-layouts3">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Venta</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('venta.formVenta')}}">Agregar</a></li>
                {{-- <li class="nav-item"> <a class="nav-link" href="{{route('producto.index')}}">Ver todos</a></li> --}}
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('venta.ventasContado')}}">Ventas contado</a></li>
                {{-- <li class="nav-item"> <a class="nav-link" href="{{route('producto.index')}}">Ver todos</a></li> --}}
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('venta.ventasCredito')}}">Ventas credito</a></li>
                {{-- <li class="nav-item"> <a class="nav-link" href="{{route('producto.index')}}">Ver todos</a></li> --}}
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('venta.ventasPagadas')}}">Ventas pagadas</a></li>
                {{-- <li class="nav-item"> <a class="nav-link" href="{{route('producto.index')}}">Ver todos</a></li> --}}
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Clientes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('cliente.create')}}">Agregar</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('cliente.index')}}">Ver todos</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts2" aria-expanded="false" aria-controls="page-layouts2">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Deudas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts2">
              <ul class="nav flex-column sub-menu">
                {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="">Agregar</a></li> --}}
                <li class="nav-item"> <a class="nav-link" href="{{route('deuda.index')}}">Ver todos</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts4" aria-expanded="false" aria-controls="page-layouts4">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Proveedores</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts4">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="">Agregar</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Ver todos</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts5" aria-expanded="false" aria-controls="page-layouts5">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Abonos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts5">
              <ul class="nav flex-column sub-menu">
                {{-- <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="">Agregar</a></li> --}}
                <li class="nav-item"> <a class="nav-link" href="{{route('abono.index')}}">Ver todos</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts6" aria-expanded="false" aria-controls="page-layouts6">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Productos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts6">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('producto.create')}}">Agregar</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('producto.index')}}">Ver todos</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts8" aria-expanded="false" aria-controls="page-layouts8">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Descuentos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts8">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('descuento.crear')}}">Agregar</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Ver todos</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
              <i class="fas fa-columns menu-icon"></i>
              <span class="menu-title">Categorías</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('categoria.create')}}">Agregar</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('categoria.index')}}">Ver todos</a></li>
             </ul>
            </div>
          </li>

      

          <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts2" aria-expanded="false" aria-controls="sidebar-layouts2">
              <i class="fas fa-columns menu-icon"></i>
              <span class="menu-title">Subcategorías</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-layouts2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('subcategoria.create')}}">Agregar</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('subcategoria.index')}}">Ver todos</a></li>
             </ul>
            </div>
          </li>
        
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fa fa-user mr-2"></i>
                          Clientes
                        </p>
                        <h2>54000</h2>
                        <label class="badge badge-outline-success badge-pill">2.7% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                          Avg Time
                        </p>
                        <h2>123.50</h2>
                        <label class="badge badge-outline-danger badge-pill">30% decrease</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                          Downloads
                        </p>
                        <h2>3500</h2>
                        <label class="badge badge-outline-success badge-pill">12% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-check-circle mr-2"></i>
                          Update
                        </p>
                        <h2>7500</h2>
                        <label class="badge badge-outline-success badge-pill">57% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          Sales
                        </p>
                        <h2>9000</h2>
                        <label class="badge badge-outline-success badge-pill">10% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-circle-notch mr-2"></i>
                          Pending
                        </p>
                        <h2>7500</h2>
                        <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @yield('contenido')
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{date('Y')}}. Todos los derechos reservados.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made with <i class="far fa-heart text-danger"></i> by GAMR</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('admin/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin/js/misc.js')}}"></script>
  <script src="{{asset('admin/js/settings.js')}}"></script>
  <script src="{{asset('admin/js/todolist.js')}}"></script>

  {{-- <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script> --}}
  <script src="{{asset('admin/js/data-table.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('admin/js/dashboard.js')}}"></script>
  <script src="{{asset('admin/js/tabs.js')}}"></script>
  <!-- End custom js for this page-->
  @include('sweetalert::alert')
</body>


</html>
