<header class="ec-header">
    <!--Ec Header Top Start -->
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <!-- Header Top social Start -->
                <div class="col text-left header-top-left d-none d-lg-block">
                    <div class="header-top-social">
                        <span class="social-text text-upper">Siguenos en:</span>
                        <ul class="mb-0">
                            <li class="list-inline-item"><a class="hdr-facebook" href="https://www.facebook.com/Electromuebles-Alexa-104382285305668"><i class="ecicon eci-facebook"></i></a></li>
                            {{-- <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li> --}}
                            <li class="list-inline-item"><a class="hdr-instagram" href="https://www.instagram.com/electromueblesalexa/"><i class="ecicon eci-instagram"></i></a></li>
                            {{-- <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <!-- Header Top social End -->
              
                <!-- Header Top Language Currency -->
                <div class="col header-top-right d-none d-lg-block">
                    <div class="header-top-lan-curr d-flex justify-content-end">
                        {{-- <!-- Currency Start -->
                        <div class="header-top-curr dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                    class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                                <li><a class="dropdown-item" href="#">EUR €</a></li>
                            </ul>
                        </div> --}}
                        <!-- Currency End -->
                        <!-- Language Start -->
                        {{-- <div class="header-top-lan dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Lenguage<i
                                    class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">Inglés</a></li>
                                <li><a class="dropdown-item" href="#">Italiano</a></li>
                            </ul>
                        </div> --}}
                        <!-- Language End -->

                    </div>
                </div>
                <!-- Header Top Language Currency -->
                <!-- Header Top responsive Action -->
                <div class="col d-lg-none ">
                    <div class="ec-header-bottons">
                        <!-- Header User Start -->
                        <div class="ec-header-user dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown"><img
                                    src="{{asset('images/icons/user.svg')}}" class="svg_img header_svg" alt="" /></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="{{route('register')}}">Registrarse</a></li>
                            
                                <li><a class="dropdown-item" href="{{route('login')}}">Iniciar sesión</a></li>
                            </ul>
                        </div>
                        <!-- Header User End -->
                        <!-- Header Cart Start -->
                        <a href="wishlist.html" class="ec-header-btn ec-header-wishlist">
                            <div class="header-icon"><img src="{{asset('images/icons/wishlist.svg')}}"
                                    class="svg_img header_svg" alt="" /></div>
                            <span class="ec-header-count">4</span>
                        </a>
                        <!-- Header Cart End -->
                        <!-- Header Cart Start -->
                        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                            <div class="header-icon"><img src="{{asset('images/icons/cart.svg')}}"
                                    class="svg_img header_svg" alt="" /></div>
                            <span class="ec-header-count cart-count-lable">{{count($shopping_cart->shopping_cart_details)}}</span>
                        </a>
                        <!-- Header Cart End -->
                        <!-- Header menu Start -->
                        <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                            <img src="{{asset('images/icons/menu.svg')}}" class="svg_img header_svg" alt="icon" />
                        </a>
                        <!-- Header menu End -->
                    </div>
                </div>
                <!-- Header Top responsive Action -->
            </div>
        </div>
    </div>
    <!-- Ec Header Top  End -->
    <!-- Ec Header Bottom  Start -->
    <div class="ec-header-bottom d-none d-lg-block">
        <div class="container position-relative">
            <div class="row">
                <div class="ec-flex">
                    <!-- Ec Header Logo Start -->
                    <div class="align-self-center">
                        <div class="header-logo">
                            <a href="index.html"><img src="{{asset('images/logo/logoAlexa.png')}}" alt="Site Logo" /><img
                                    class="dark-logo" src="{{asset('images/logo/logoAlexa.png')}}" alt="Site Logo"
                                    style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->

                    <!-- Ec Header Search Start -->
                    <div class="align-self-center">
                        <div class="header-search">
                            <form class="ec-btn-group-form" method="GET" action="{{route('home.buscarProducto')}}">
                                <input class="form-control ec-search-bar" name="nombre" placeholder="Buscar productos..." type="text">
                                <button class="submit" type="submit"><img src="{{asset('images/icons/search.svg')}}"
                                        class="svg_img header_svg" alt="" /></button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->

                    <!-- Ec Header Button Start -->
                    <div class="align-self-center">
                        <div class="ec-header-bottons">

                            <!-- Header User Start -->
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown"><img
                                        src="{{asset('images/icons/user.svg')}}" class="svg_img header_svg" alt="" /></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="{{route('register')}}">Registrarse</a></li>
                                    
                                    <li><a class="dropdown-item" href="{{route('login')}}">Iniciar sesión</a></li>
                                </ul>
                            </div>
                            <!-- Header User End -->
                            {{-- <!-- Header wishlist Start -->
                            <a href="wishlist.html" class="ec-header-btn ec-header-wishlist">
                                <div class="header-icon"><img src="{{asset('images/icons/wishlist.svg')}}"
                                        class="svg_img header_svg" alt="" /></div>
                                <span class="ec-header-count">4</span>
                            </a>
                            <!-- Header wishlist End --> --}}
                            <!-- Header Cart Start -->
                            <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                <div class="header-icon"><img src="{{asset('images/icons/cart.svg')}}"
                                        class="svg_img header_svg" alt="" /></div>
                                <span class="ec-header-count cart-count-lable">{{count($shopping_cart->shopping_cart_details)}}</span>
                            </a>
                            <!-- Header Cart End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Header Button End -->
    <!-- Header responsive Bottom  Start -->
    <div class="ec-header-bottom d-lg-none">
        <div class="container position-relative">
            <div class="row ">

                <!-- Ec Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="index.html"><img src="{{asset('images/logo/logoAlexa.png')}}" alt="Site Logo" /><img
                                class="dark-logo" src="{{asset('images/logo/logoAlexa.png')}}" alt="Site Logo"
                                style="display: none;" /></a>
                    </div>
                </div>
                <!-- Ec Header Logo End -->
                <!-- Ec Header Search Start -->
                <div class="col">
                    <div class="header-search">
                        <form class="ec-btn-group-form" action="#">
                            <input class="form-control ec-search-bar" placeholder="Buscar productos..." type="text">
                            <button class="submit" type="submit"><img src="{{asset('images/icons/search.svg')}}"
                                    class="svg_img header_svg" alt="icon" /></button>
                        </form>
                    </div>
                </div>
                <!-- Ec Header Search End -->
            </div>
        </div>
    </div>
    <!-- Header responsive Bottom  End -->
    <!-- EC Main Menu Start -->
    <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <div class="ec-main-menu">
                        <ul>
                            <li><a href="{{route('home')}}">Inicio</a></li>
                            <li class="dropdown position-static"><a href="javascript:void(0)">Categorías</a>
                                <ul class="mega-menu d-block">
                                    <li class="d-flex">
                                        @foreach($categorias as $categoria)
                                        <ul class="d-block">
                                            <li class="menu_title"><a href="javascript:void(0)">{{$categoria->nombre}}
                                                    </a></li>
                                                    @foreach($categoria->subcategorias as $subcategoria)
                                            <li><a href="{{route('home.articulosBySubcategoria',$subcategoria->id)}}" >{{$subcategoria->nombre}}</a>
                                            </li>
                                         @endforeach
                                        </ul>
                                        @endforeach
                                    </li>
                                    <li>
                                        <ul class="ec-main-banner w-100">
                                            <li><a class="p-0" href="shop-left-sidebar-col-3.html"><img
                                                        class="img-responsive" src="{{asset('images/menu-banner/1.jpg')}}"
                                                        alt=""></a></li>
                                            <li><a class="p-0" href="shop-left-sidebar-col-4.html"><img
                                                        class="img-responsive" src="{{asset('images/menu-banner/2.jpg')}}"
                                                        alt=""></a></li>
                                            <li><a class="p-0" href="shop-right-sidebar-col-3.html"><img
                                                        class="img-responsive" src="{{asset('images/menu-banner/3.jpg')}}"
                                                        alt=""></a></li>
                                            <li><a class="p-0" href="shop-right-sidebar-col-4.html"><img
                                                        class="img-responsive" src="{{asset('images/menu-banner/4.jpg')}}"
                                                        alt=""></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="{{route('home.tienda')}}">Productos</a>
                          
                            </li>
                       
                           
                            {{-- <li class="dropdown"><a href="javascript:void(0)">Otros</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('home.nosotros')}}">Nosotros</a></li>
                                    <li><a href="{{route('home.contactanos')}}">Contactanos</a></li>
                                </ul>
                            </li> --}}
                       
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Main Menu End -->
    <!-- ekka Mobile Menu Start -->
    <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
        <div class="ec-menu-title">
            <span class="menu_title">Menu</span>
            <button class="ec-close">×</button>
        </div>
        <div class="ec-menu-inner">
            <div class="ec-menu-content">
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="javascript:void(0)">Categorías</a>
                        <ul class="sub-menu">
                            @foreach($categorias as $categoria)
                            <li>
                                <a href="{{route('home.articulosByCategoria',$categoria->id)}}">{{$categoria->nombre}}</a>
                            </li>
                         @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('home.tienda')}}">Tienda</a>
                      
                    </li>
                    {{-- <li><a href="javascript:void(0)">Others</a>
                        <ul class="sub-menu">
                            <li><a href="javascript:void(0)">Mail Confirmation</a>
                                <ul class="sub-menu">
                                    <li><a href="email-template-confirm-1.html">Mail Confirmation 1</a></li>
                                    <li><a href="email-template-confirm-2.html">Mail Confirmation 2</a></li>
                                    <li><a href="email-template-confirm-3.html">Mail Confirmation 3</a></li>
                                    <li><a href="email-template-confirm-4.html">Mail Confirmation 4</a></li>
                                    <li><a href="email-template-confirm-5.html">Mail Confirmation 5</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Mail Reset password</a>
                                <ul class="sub-menu">
                                    <li><a href="email-template-forgot-password-1.html">Reset password 1</a></li>
                                    <li><a href="email-template-forgot-password-2.html">Reset password 2</a></li>
                                    <li><a href="email-template-forgot-password-3.html">Reset password 3</a></li>
                                    <li><a href="email-template-forgot-password-4.html">Reset password 4</a></li>
                                    <li><a href="email-template-forgot-password-5.html">Reset password 5</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Mail Promotional</a>
                                <ul class="sub-menu">
                                    <li><a href="email-template-offers-1.html">Offer Mail 1</a></li>
                                    <li><a href="email-template-offers-2.html">Offer Mail 2</a></li>
                                    <li><a href="email-template-offers-3.html">Offer Mail 3</a></li>
                                    <li><a href="email-template-offers-4.html">Offer Mail 4</a></li>
                                    <li><a href="email-template-offers-5.html">Offer Mail 5</a></li>
                                    <li><a href="email-template-offers-6.html">Offer Mail 6</a></li>
                                    <li><a href="email-template-offers-7.html">Offer Mail 7</a></li>
                                    <li><a href="email-template-offers-8.html">Offer Mail 8</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Vendor Account Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                    <li><a href="vendor-profile.html">Vendor Profile</a></li>
                                    <li><a href="vendor-uploads.html">Vendor Uploads</a></li>
                                    <li><a href="vendor-settings.html">Vendor Settings</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">User Account Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="user-profile.html">User Profile</a></li>
                                    <li><a href="user-history.html">User History</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="track-order.html">Track Order</a></li>
                                    <li><a href="user-invoice.html">User Invoice</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Construction Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="404-error-page.html">404 Error Page</a></li>
                                    <li><a href="under-maintenance.html">Maintenance Page</a></li>
                                    <li><a href="coming-soon.html">Comming Soon Page</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Vendor Catalog Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="catalog-single-vendor.html">Catalog Single Vendor</a></li>
                                    <li><a href="catalog-multi-vendor.html">Catalog Multi Vendor</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                  
               
                </ul>
            </div>
            <div class="header-res-lan-curr">
                <div class="header-top-lan-curr">
                    <!-- Language Start -->
                    {{-- <div class="header-top-lan dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i
                                class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Italiano</a></li>
                        </ul>
                    </div> --}}
                    <!-- Language End -->
                    <!-- Currency Start -->
                    {{-- <div class="header-top-curr dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                            <li><a class="dropdown-item" href="#">EUR €</a></li>
                        </ul>
                    </div> --}}
                    <!-- Currency End -->
                </div>
                <!-- Social Start -->
                <div class="header-res-social">
                    <div class="header-top-social">
                        <ul class="mb-0">
                            <li class="list-inline-item"><a class="hdr-facebook" href="https://www.facebook.com/Electromuebles-Alexa-104382285305668"><i class="ecicon eci-facebook"></i></a></li>
                            {{-- <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li> --}}
                            <li class="list-inline-item"><a class="hdr-instagram" href="https://www.instagram.com/electromueblesalexa/"><i class="ecicon eci-instagram"></i></a></li>
                            {{-- <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <!-- Social End -->
            </div>
        </div>
    </div>
    <!-- ekka mobile Menu End -->
</header>