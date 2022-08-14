<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
<body class="shop_page">

   <!-- Header start  -->
@include('layouts.header')
   <!-- Header End  -->

   <!-- ekka Cart Start -->
  @include('layouts.minicart')
   <!-- ekka Cart End -->

   <!-- Ec breadcrumb start -->
@include('layouts.breadcrumb',["pagina"=>"Productos"])
   <!-- Ec breadcrumb end -->

   <!-- Ec Shop page -->
   <section class="ec-page-content section-space-p">
       <div class="container">
           <div class="row">
               <div class="ec-shop-rightside col-lg-9 col-md-12 margin-b-30">
                   <!-- Shop Top Start -->
                   <div class="ec-pro-list-top d-flex">
                       <div class="col-md-6 ec-grid-list">
                           <div class="ec-gl-btn">
                               <button class="btn btn-grid active"><img src="{{asset('images/icons/grid.svg')}}"
                                       class="svg_img gl_svg" alt="" /></button>
                               <button class="btn btn-list"><img src="{{asset('images/icons/list.svg')}}"
                                       class="svg_img gl_svg" alt="" /></button>
                           </div>
                       </div>
                       <div class="col-md-6 ec-sort-select">
                           <span class="sort-by">Ordenar por</span>
                           <div class="ec-select-inner">
                            <form id="ordenar-form" action="{{route('home.ordenarProductosTienda')}}" method="GET" >
                               <select id="orden" onchange="ordenar();" name="orden" id="ec-select">
                                   <option selected disabled>Posición</option>
                                   <option value="1">Nombre, A hasta Z</option>
                                   <option value="2">Nombre, Z hasta A</option>
                               </select>
                            </form>
                           </div>
                       </div>
                   </div>
                   <!-- Shop Top End -->

                   <!-- Shop content Start -->
                   <div class="shop-pro-content">
                       <div class="shop-pro-inner">
                           <div class="row">
                               @foreach($productos as $producto)
                               <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                   <div class="ec-product-inner">
                                       <div class="ec-pro-image-outer">
                                           <div class="ec-pro-image">
                                               <a href="product-left-sidebar.html" class="image">
                                               @if(count($producto->images)>1)
                                                   <img class="main-image"
                                                       src="{{$producto->images->pluck('url')[0]}}" alt="Product" />
                                                   <img class="hover-image"
                                                       src="{{$producto->images->pluck('url')[1]}}" alt="Product" />
                                                       @else
                                                       <img class="main-image"
                                                       src="{{$producto->images->pluck('url')[0]}}" alt="Product" />
                                                       @endif
                                                      
                                               </a>
                                               @if($producto->haveDiscount($producto->id))
                                               <span class="percentage">{{floatval($producto->productoprecio->descuento)}}%</span>
                                               @endif
                                               <a href="#" class="quickview" data-link-action="quickview"
                                                   title="Ver producto" data-bs-toggle="modal"
                                                   data-bs-target="#ec_quickview_modal"><img
                                                       src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                                       alt="" /></a>
                                               <div class="ec-pro-actions">
                                                   <a href="" class="ec-btn-group compare"
                                                       title="Compare"><img src="{{asset('images/icons/compare.svg')}}"
                                                           class="svg_img pro_svg" alt="" /></a>
                                                           <form action="{{route('shopping_cart_details.store')}}" id="addcar{{$producto->id}}" method="POST"  class="d-none">
                                                            @csrf
                                                             <input type="hidden" name="cantidad" value="1" >
                                                             <input type="number" name="producto_id" value="{{$producto->id}}">
                                                        
                                                            </form>
                                                            <a title="Añadir al carrito" onclick="event.preventDefault();
                                                            document.getElementById('addcar{{$producto->id}}').submit();" class=" add-to-cart"><img
                                                                src="{{asset('images/icons/cart.svg')}}" class="svg_img pro_svg"
                                                                alt="" /> Añadir al carrito</a>
                                                   <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                           src="{{asset('images/icons/wishlist.svg')}}"
                                                           class="svg_img pro_svg" alt="" /></a>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="ec-pro-content">
                                           <h5 class="ec-pro-title"><a href="{{route('home.detalleProducto',$producto->id)}}">{{$producto->nombre}}</a></h5>
                                           <div class="ec-pro-rating">
                                               <i class="ecicon eci-star fill"></i>
                                               <i class="ecicon eci-star fill"></i>
                                               <i class="ecicon eci-star fill"></i>
                                               <i class="ecicon eci-star fill"></i>
                                               <i class="ecicon eci-star"></i>
                                           </div>
                                           <div class="ec-pro-list-desc">{{$producto->descripcion}}</div>
                                           <span class="ec-price">
                                            @if($producto->haveDiscount($producto->id))
                                            <span class="old-price">${{$producto->productoprecio->pvp}}</span>
                                            <span class="new-price">${{$producto->priceDiscount($producto->id)}}</span>
                                            @else
                                            <span class="new-price">${{$producto->productoprecio->pvp}}</span>
                                            @endif
                                           </span>
                                           <div class="ec-pro-option">
                                               <div class="ec-pro-color">
                                                   <span class="ec-pro-opt-label">Color</span>
                                                   <ul class="ec-opt-swatch ec-change-img">
                                                    @foreach($producto->colores as $color)
                                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                                            data-src="{{$color->imagen->url}}"
                                                            data-src-hover="{{$color->imagen->url}}"
                                                            data-tooltip="Gray"><span
                                                                style="background-color:{{$color->codigo}}"></span></a></li>
                                                                @endforeach
                                                                   
                                                   </ul>
                                               </div>
                                            
                                           </div>
                                       </div>
                                   </div>
                               </div>  



                                <!-- Modal -->
   <div class="modal fade" id="ec_quickview_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <!-- Swiper -->
                        <div class="qty-product-cover">
                            @foreach($producto->images as $imagen)
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{$imagen->url}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div class="qty-nav-thumb">
                            @foreach($producto->images as $imagen)
                            <div class="qty-slide">
                                <img class="img-responsive" src="{{$imagen->url}}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="quickview-pro-content">
                            <h5 class="ec-quick-title"><a href="product-left-sidebar.html">{{$producto->nombre}}</a>
                            </h5>
                            <div class="ec-quickview-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star"></i>
                            </div>

                            <div class="ec-quickview-desc">{{$producto->descripcion}}</div>
                            <div class="ec-quickview-price">
                                @if($producto->haveDiscount($producto->id))
                                <span class="old-price">${{$producto->productoprecio->pvp}}</span>
                                <span class="new-price">${{$producto->priceDiscount($producto->id)}}</span>
                                @else
                                <span class="new-price">${{$producto->productoprecio->pvp}}</span>
                                @endif
                            </div>

                            <div class="ec-pro-variation">
                                <div class="ec-pro-variation-inner ec-pro-variation-color">
                                    <span>Color</span>
                                    <div class="ec-pro-color">
                                        <ul class="ec-opt-swatch">
                                            @foreach($producto->colores as $color)
                                                <li><span style="background-color:{{$color->codigo}};"></span></li>
                                                @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-quickview-qty">
                                <div class="qty-plus-minus">
                                    <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                </div>
                                <div class="ec-quickview-cart ">
                                    <button class="btn btn-primary"><img src="{{asset('images/icons/cart.svg')}}"
                                            class="svg_img pro_svg" alt="" /> Añadir al carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

                               @endforeach                   
                           </div>
                       </div>
                       <!-- Ec Pagination Start -->
                       <div class="ec-pro-pagination">
                           {{-- <span>Showing 1-12 of 21 item(s)</span> --}}
                           {!!$productos->links()!!}
                           {{-- <ul class="ec-pro-pagination-inner">
                               <li><a class="active" href="#">1</a></li>
                               <li><a href="#">2</a></li>
                               <li><a href="#">3</a></li>
                               <li><a href="#">4</a></li>
                               <li><a href="#">5</a></li>
                               <li><a class="next" href="#">Siguiente <i class="ecicon eci-angle-right"></i></a></li>
                           </ul> --}}
                       </div>
                       <!-- Ec Pagination End -->
                   </div>
                   <!--Shop content End -->
               </div>
               <!-- Sidebar Area Start -->
               <div class="ec-shop-leftside col-lg-3 col-md-12">
                   <div id="shop_sidebar">
                       <div class="ec-sidebar-heading">
                           <h1>Filtrar productos por</h1>
                       </div>
                       <div class="ec-sidebar-wrap">
                           <!-- Sidebar Category Block -->
                           <div class="ec-sidebar-block">
                               <div class="ec-sb-title">
                                   <h3 class="ec-sidebar-title">Categoría</h3>
                               </div>
                               <div class="ec-sb-block-content">
                                   <ul>
                                      @foreach($categorias as $categoria)
                                       <li>
                                           <div class="ec-sidebar-block-item">
                                               <input type="checkbox" /> <a href="#">{{$categoria->nombre}}</a><span
                                                   class="checked"></span>
                                           </div>
                                       </li>
                                       @endforeach
                                       <li id="ec-more-toggle-content" style="padding: 0; display: none;">
                                           <ul>
                                               <li>
                                                   <div class="ec-sidebar-block-item">
                                                       <input type="checkbox" /> <a href="#">Watch</a><span
                                                           class="checked"></span>
                                                   </div>
                                               </li>
                                               <li>
                                                   <div class="ec-sidebar-block-item">
                                                       <input type="checkbox" /> <a href="#">Cap</a><span
                                                           class="checked"></span>
                                                   </div>
                                               </li>
                                           </ul>
                                       </li>
                                       <li>
                                           <div class="ec-sidebar-block-item ec-more-toggle">
                                               <span class="checked"></span><span id="ec-more-toggle">Más categorías</span>
                                           </div>
                                       </li>

                                   </ul>
                               </div>
                           </div>
                         
                           <div class="ec-sidebar-block ec-sidebar-block-clr">
                               <div class="ec-sb-title">
                                   <h3 class="ec-sidebar-title">Color</h3>
                               </div>
                               <div class="ec-sb-block-content">
                                   <ul>
                                       @foreach($colores as $color)
                                       <li>
                                           <div class="ec-sidebar-block-item"><span
                                                   style="background-color:{{$color}}"></span></div>
                                       </li>
                                      @endforeach
                                   
                                   </ul>
                               </div>
                           </div>
                           <!-- Sidebar Price Block -->
                           {{-- <div class="ec-sidebar-block">
                               <div class="ec-sb-title">
                                   <h3 class="ec-sidebar-title">Precio</h3>
                               </div>
                               <div class="ec-sb-block-content es-price-slider">
                                   <div class="ec-price-filter">
                                       <div id="ec-sliderPrice" class="filter__slider-price" data-min="0"
                                           data-max="250" data-step="10"></div>
                                       <div class="ec-price-input">
                                           <label class="filter__label"><input type="text"
                                                   class="filter__input"></label>
                                           <span class="ec-price-divider"></span>
                                           <label class="filter__label"><input type="text"
                                                   class="filter__input"></label>
                                       </div>
                                   </div>
                               </div>
                           </div> --}}
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- End Shop page -->

   <!-- Footer Start -->
  @include('layouts.footer')
   <!-- Footer Area End -->

  

   <!-- Footer navigation panel for responsive display -->
   <div class="ec-nav-toolbar">
       <div class="container">
           <div class="ec-nav-panel">
               <div class="ec-nav-panel-icons">
                   <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><img
                           src="{{asset('images/icons/menu.svg')}}" class="svg_img header_svg" alt="" /></a>
               </div>
               <div class="ec-nav-panel-icons">
                   <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><img
                           src="{{asset('images/icons/cart.svg')}}" class="svg_img header_svg" alt="" /><span
                           class="ec-cart-noti ec-header-count cart-count-lable">3</span></a>
               </div>
               <div class="ec-nav-panel-icons">
                   <a href="index.html" class="ec-header-btn"><img src="{{asset('images/icons/home.svg')}}"
                           class="svg_img header_svg" alt="icon" /></a>
               </div>
               <div class="ec-nav-panel-icons">
                   <a href="wishlist.html" class="ec-header-btn"><img src="{{asset('images/icons/wishlist.svg')}}"
                           class="svg_img header_svg" alt="icon" /><span class="ec-cart-noti">4</span></a>
               </div>
               <div class="ec-nav-panel-icons">
                   <a href="login.html" class="ec-header-btn"><img src="{{asset('images/icons/user.svg')}}"
                           class="svg_img header_svg" alt="icon" /></a>
               </div>

           </div>
       </div>
   </div>
   <!-- Footer navigation panel for responsive display end -->


   <!-- Cart Floating Button -->
   <div class="ec-cart-float">
       <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
           <div class="header-icon"><img src="{{asset('images/icons/cart.svg')}}" class="svg_img header_svg" alt="" /></div>
           <span class="ec-cart-count cart-count-lable">3</span>
       </a>
   </div>
   <!-- Cart Floating Button end -->

   <!-- Whatsapp -->
   <div class="ec-style ec-right-bottom">
       <!-- Start Floating Panel Container -->
       <div class="ec-panel">
           <!-- Panel Header -->
           <div class="ec-header">
               <strong>Need Help?</strong>
               <p>Chat with us on WhatsApp</p>
           </div>
           <!-- Panel Content -->
           <div class="ec-body">
               <ul>
                   <!-- Start Single Contact List -->
                   <li>
                       <a class="ec-list" data-number="918866774266"
                           data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                           <div class="d-flex bd-highlight">
                               <!-- Profile Picture -->
                               <div class="ec-img-cont">
                                   <img src="{{asset('images/whatsapp/profile_01.jpg')}}" class="ec-user-img"
                                       alt="Profile image">
                                   <span class="ec-status-icon"></span>
                               </div>
                               <!-- Display Name & Last Seen -->
                               <div class="ec-user-info">
                                   <span>Sahar Darya</span>
                                   <p>Sahar left 7 mins ago</p>
                               </div>
                               <!-- Chat iCon -->
                               <div class="ec-chat-icon">
                                   <i class="fa fa-whatsapp"></i>
                               </div>
                           </div>
                       </a>
                   </li>
                   <!--/ End Single Contact List -->
                   <!-- Start Single Contact List -->
                   <li>
                       <a class="ec-list" data-number="918866774266"
                           data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                           <div class="d-flex bd-highlight">
                               <!-- Profile Picture -->
                               <div class="ec-img-cont">
                                   <img src="{{asset('images/whatsapp/profile_02.jpg')}}" class="ec-user-img"
                                       alt="Profile image">
                                   <span class="ec-status-icon ec-online"></span>
                               </div>
                               <!-- Display Name & Last Seen -->
                               <div class="ec-user-info">
                                   <span>Yolduz Rafi</span>
                                   <p>Yolduz is online</p>
                               </div>
                               <!-- Chat iCon -->
                               <div class="ec-chat-icon">
                                   <i class="fa fa-whatsapp"></i>
                               </div>
                           </div>
                       </a>
                   </li>
                   <!--/ End Single Contact List -->
                   <!-- Start Single Contact List -->
                   <li>
                       <a class="ec-list" data-number="918866774266"
                           data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                           <div class="d-flex bd-highlight">
                               <!-- Profile Picture -->
                               <div class="ec-img-cont">
                                   <img src="{{asset('images/whatsapp/profile_03.jpg')}}" class="ec-user-img"
                                       alt="Profile image">
                                   <span class="ec-status-icon ec-offline"></span>
                               </div>
                               <!-- Display Name & Last Seen -->
                               <div class="ec-user-info">
                                   <span>Nargis Hawa</span>
                                   <p>Nargis left 30 mins ago</p>
                               </div>
                               <!-- Chat iCon -->
                               <div class="ec-chat-icon">
                                   <i class="fa fa-whatsapp"></i>
                               </div>
                           </div>
                       </a>
                   </li>
                   <!--/ End Single Contact List -->
                   <!-- Start Single Contact List -->
                   <li>
                       <a class="ec-list" data-number="918866774266"
                           data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                           <div class="d-flex bd-highlight">
                               <!-- Profile Picture -->
                               <div class="ec-img-cont">
                                   <img src="{{asset('images/whatsapp/profile_04.jpg')}}" class="ec-user-img"
                                       alt="Profile image">
                                   <span class="ec-status-icon ec-offline"></span>
                               </div>
                               <!-- Display Name & Last Seen -->
                               <div class="ec-user-info">
                                   <span>Khadija Mehr</span>
                                   <p>Khadija left 50 mins ago</p>
                               </div>
                               <!-- Chat iCon -->
                               <div class="ec-chat-icon">
                                   <i class="fa fa-whatsapp"></i>
                               </div>
                           </div>
                       </a>
                   </li>
                   <!--/ End Single Contact List -->
               </ul>
           </div>
       </div>
       <!--/ End Floating Panel Container -->
       <!-- Start Right Floating Button-->
       <div class="ec-right-bottom">
           <div class="ec-box">
               <div class="ec-button rotateBackward">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=593988703045&text=Me%20interesa%20saber%20m%C3%A1s%20sobre%20los%20%C3%A1rticulos%20de%20la%20tienda">
                   <img class="whatsapp" src="{{asset('images/common/whatsapp.png')}}" alt="whatsapp icon" />
                </a>
               </div>
           </div>
       </div>
       <!--/ End Right Floating Button-->
   </div>
   <!-- Whatsapp end -->

   <!-- Feature tools -->
   <div class="ec-tools-sidebar-overlay"></div>
   <div class="ec-tools-sidebar">
       <div class="tool-title">
           <h3>Features</h3>
       </div>
       <a href="#" class="ec-tools-sidebar-toggle in-out">
           <img alt="icon" src="{{asset('images/common/settings.png')}}" />
       </a>
       <div class="ec-tools-detail">
           <div class="ec-tools-sidebar-content ec-change-color ec-color-desc">
               <h3>Color Scheme</h3>
               <ul class="bg-panel">
                   <li class="active" data-color="01"><a href="#" class="colorcode1"></a></li>
                   <li data-color="02"><a href="#" class="colorcode2"></a></li>
                   <li data-color="03"><a href="#" class="colorcode3"></a></li>
                   <li data-color="04"><a href="#" class="colorcode4"></a></li>
                   <li data-color="05"><a href="#" class="colorcode5"></a></li>
               </ul>
           </div>
           <div class="ec-tools-sidebar-content">
               <h3>Backgrounds</h3>
               <ul class="bg-panel">
                   <li class="bg"><a class="back-bg-1" id="bg-1">Background-1</a></li>
                   <li class="bg"><a class="back-bg-2" id="bg-2">Background-2</a></li>
                   <li class="bg"><a class="back-bg-3" id="bg-3">Background-3</a></li>
                   <li class="bg"><a class="back-bg-4" id="bg-4">Default</a></li>
               </ul>
           </div>
           <div class="ec-tools-sidebar-content">
               <h3>Full Screen mode</h3>
               <div class="ec-fullscreen-mode">
                   <div class="ec-fullscreen-switch">
                       <div class="ec-fullscreen-btn">Mode</div>
                       <div class="ec-fullscreen-on">On</div>
                       <div class="ec-fullscreen-off">Off</div>
                   </div>
               </div>
           </div>
           <div class="ec-tools-sidebar-content">
               <h3>Dark mode</h3>
               <div class="ec-change-mode">
                   <div class="ec-mode-switch">
                       <div class="ec-mode-btn">Mode</div>
                       <div class="ec-mode-on">On</div>
                       <div class="ec-mode-off">Off</div>
                   </div>
               </div>
           </div>
           <div class="ec-tools-sidebar-content">
               <h3>RTL mode</h3>
               <div class="ec-change-rtl">
                   <div class="ec-rtl-switch">
                       <div class="ec-rtl-btn">Rtl</div>
                       <div class="ec-rtl-on">On</div>
                       <div class="ec-rtl-off">Off</div>
                   </div>
               </div>
           </div>
           <div class="ec-tools-sidebar-content">
               <h3>Language</h3>
               <div class="ec-change-lang">
                   <span id="google_translate_element"></span>
               </div>
           </div>
           <div class="ec-tools-sidebar-content">
               <h3>Clear local storage</h3>
               <a class="clear-cach" href="javascript:void(0)">Clear Cache & Default</a>
           </div>
       </div>
   </div>
   <!-- Feature tools end -->

   <!-- Vendor JS -->
@include('layouts.scripts')

</body>
</html>