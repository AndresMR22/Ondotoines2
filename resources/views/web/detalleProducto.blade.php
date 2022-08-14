<!DOCTYPE html>
<html lang="es">

@include('layouts.head')
<body class="product_page">
  

   <!-- Header start  -->
   @include('layouts.header')
   <!-- Header End  -->

   <!-- ekka Cart Start -->
  @include('layouts.minicart')
   <!-- ekka Cart End -->

   <!-- Ec breadcrumb start -->
@include('layouts.breadcrumb',["pagina"=>"Detalle del producto"])
   <!-- Ec breadcrumb end -->

   <!-- Sart Single product -->
   <section class="ec-page-content section-space-p">
       <div class="container">
           <div class="row">
               <div class="ec-pro-rightside ec-common-rightside col-lg-9 col-md-12">

                   <!-- Single product content Start -->
                   <div class="single-pro-block">
                       <div class="single-pro-inner">
                           <div class="row">
                               <div class="single-pro-img">
                                   <div class="single-product-scroll">
                                       <div class="single-product-cover">
                                        @foreach($producto->images as $imagen)
                                           <div class="single-slide zoom-image-hover">
                                               <img class="img-responsive" src="{{$imagen->url}}"
                                                   alt="">
                                           </div>
                                       @endforeach
                                       </div>
                                       {{-- <div class="single-nav-thumb">
                                           @foreach($producto->images as $imagen)
                                           <div class="single-slide">
                                               <img class="img-responsive" src="{{$imagen->url}}"
                                                   alt="">
                                           </div>
                                         @endforeach
                                       </div> --}}
                                   </div>
                               </div>
                               <div class="single-pro-desc">
                                   <div class="single-pro-content">
                                       <h5 class="ec-single-title">{{$producto->nombre}}</h5>
                                       <div class="ec-single-rating-wrap">
                                           <div class="ec-single-rating">
                                               <i class="ecicon eci-star fill"></i>
                                               <i class="ecicon eci-star fill"></i>
                                               <i class="ecicon eci-star fill"></i>
                                               <i class="ecicon eci-star fill"></i>
                                               <i class="ecicon eci-star-o"></i>
                                           </div>
                                           <span class="ec-read-review"><a href="#ec-spt-nav-review">Se el primero en revisar este articulo</a></span>
                                       </div>
                                       <div class="ec-single-desc">{{$producto->descripcion}}</div>

                                    
                                       <div class="ec-single-price-stoke">
                                           <div class="ec-single-price">
                                               <span class="ec-single-ps-title">Precio</span>
                                               @if($producto->haveDiscount($producto->id))
                                    {{-- <span class="old-price">${{$producto->productoprecio->pvp}}</span> --}}
                            <span class="new-price">${{$producto->priceDiscount($producto->id)}}</span>
                                    @else
                                    <span class="new-price">${{$producto->productoprecio->pvp}}</span>
                                    @endif
                                           </div>
                                           <div class="ec-single-stoke">
                                               <span class="ec-single-ps-title">EN STOCK</span>
                                               <span class="ec-single-sku">#: {{$producto->stockByProduct($producto)}}</span>
                                           </div>
                                       </div>

                                       <div class="ec-single-qty">
                                           <div class="qty-plus-minus">
                                               <input class="qty-input" type="number" name="ec_qtybtn" value="5" />
                                           </div>
                                           <div class="ec-single-cart ">
                                               <button class="btn btn-primary">Agregar al carrito</button>
                                           </div>
                                           <div class="ec-single-wishlist">
                                               <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                       src="{{asset('images/icons/wishlist.svg')}}" class="svg_img pro_svg"
                                                       alt="" /></a>
                                           </div>
                                           <div class="ec-single-quickview">
                                               <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                   title="Quick view" data-bs-toggle="modal"
                                                   data-bs-target="#ec_quickview_modal"><img
                                                       src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                                       alt="" /></a>
                                           </div>
                                       </div>
                                       <div class="ec-single-social">
                                           <ul class="mb-0">
                                               <li class="list-inline-item facebook"><a href="#"><i
                                                           class="ecicon eci-facebook"></i></a></li>
                                               <li class="list-inline-item instagram"><a href="#"><i
                                                           class="ecicon eci-instagram"></i></a></li>
                                               <li class="list-inline-item whatsapp"><a href="#"><i
                                                           class="ecicon eci-whatsapp"></i></a></li>
                                             
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!--Single product content End -->
                   <!-- Single product tab start -->
                   <div class="ec-single-pro-tab">
                       <div class="ec-single-pro-tab-wrapper">
                           <div class="ec-single-pro-tab-nav">
                               <ul class="nav nav-tabs">
                                   <li class="nav-item">
                                       <a class="nav-link active" data-bs-toggle="tab"
                                           data-bs-target="#ec-spt-nav-details" role="tablist">Detalle</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info"
                                           role="tablist">Más información</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review"
                                           role="tablist">Comentarios</a>
                                   </li>
                               </ul>
                           </div>
                           <div class="tab-content  ec-single-pro-tab-content">
                               <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                   <div class="ec-single-pro-tab-desc">
                                       <p>{{$producto->descripcion}}
                                       </p>
                                       <ul>
                                           <li>Any Product types that You want - Simple, Configurable</li>
                                           <li>Downloadable/Digital Products, Virtual Products</li>
                                           <li>Inventory Management with Backordered items</li>
                                           <li>Flatlock seams throughout.</li>
                                       </ul>
                                   </div>
                               </div>
                               <div id="ec-spt-nav-info" class="tab-pane fade">
                                   <div class="ec-single-pro-tab-moreinfo">
                                       <ul>
                                           <li><span>Weight</span> 1000 g</li>
                                           <li><span>Dimensions</span> 35 × 30 × 7 cm</li>
                                           <li><span>Color</span> Black, Pink, Red, White</li>
                                       </ul>
                                   </div>
                               </div>

                               <div id="ec-spt-nav-review" class="tab-pane fade">
                                   <div class="row">
                                    @if(count($producto->ratings)==0)
                                    <p>Aún no hay comentarios para en este articulo
                                    </p>
                                    @else
                                    @foreach($producto->ratings as $rating)
                                       <div class="ec-t-review-wrapper">
                                           <div class="ec-t-review-item">
                                               <div class="ec-t-review-avtar">
                                                   <img src="{{asset('images/review-image/1.jpg')}}" alt="" />
                                               </div>
                                               <div class="ec-t-review-content">
                                                   <div class="ec-t-review-top">
                                                       <div class="ec-t-review-name">{{$rating->user->name}}</div>
                                                       <div class="ec-t-review-rating">
                                                        @for($i=1; $i<=$rating->rating; $i++)
                                                           <i class="ecicon eci-star fill"></i>
                                                        @endfor
                                                        @if($rating->rating<5)
                                                        
                                                            @php
                                                            $resto = 5-$rating->rating;
                                                            @endphp
                                                             @for($i=1; $i<=$resto; $i++)
                                                             <i class="ecicon eci-star"></i>
                                                            @endfor

                                                        
                                                        @endif
                                                       </div>
                                                   </div>
                                                   <div class="ec-t-review-bottom">
                                                       <p>{{ $rating->comment }}
                                                       </p>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       @endforeach
                                       @endif

                                       <div class="ec-ratting-content">
                                           <h3>Agrega un comentario</h3>
                                           <div class="ec-ratting-form">
                                               <form action="{{route('cliente.comentarArticulo',$producto)}}" method="POST">
                                                @csrf
                                                   <div class="ec-ratting-star">
                                                       <span>Su calificación:</span>
                                                      
                    <div class="rate" >
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="Excelente">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="Bonito">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="Aceptable">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="Bajo">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="Malo">1 star</label>
                      </div>
                      <input name="producto_id" type="text" value="{{$producto->id}}" style="display:none">
                                                   </div>
                                                   <div class="ec-ratting-input">
                                                       <input name="name" placeholder="Nombre" type="text" />
                                                   </div>
                                                   <div class="ec-ratting-input">
                                                       <input name="email" placeholder="Email*" type="email"
                                                           required />
                                                   </div>
                                                   <div class="ec-ratting-input form-submit">
                                                       <textarea name="comentario"
                                                           placeholder="Agregue su comentario"></textarea>
                                                       <button class="btn btn-primary" type="submit"
                                                           value="Enviar">Enviar</button>
                                                   </div>
                                               </form>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- product details description area end -->
               </div>
               <!-- Sidebar Area Start -->
               <div class="ec-pro-leftside ec-common-leftside col-lg-3 col-md-12">
                   <div class="ec-sidebar-wrap">
                       <!-- Sidebar Category Block -->
                       <div class="ec-sidebar-block">
                           <div class="ec-sb-title">
                               <h3 class="ec-sidebar-title">Categoría</h3>
                           </div>
                           @foreach($categorias as $categoria)
                           <div class="ec-sb-block-content">
                               <ul>
                                   <li>
                                       <div class="ec-sidebar-block-item">{{$categoria->nombre}}</div>
                                       <ul style="display: block;">
                                        @foreach($categoria->subcategorias as $subcategoria)
                                           <li>
                                               <div class="ec-sidebar-sub-item"><a href="#">{{$subcategoria->nombre}}<span>1</span></a>
                                               </div>
                                           </li>
                                        @endforeach
                                       </ul>
                                   </li>
                               </ul>
                           </div>
                           @endforeach
                       </div>
                       <!-- Sidebar Category Block -->
                   </div>
                   @include('components.detalle_producto.masVendidos')
               </div>
               <!-- Sidebar Area Start -->
           </div>
       </div>
   </section>
   <!-- End Single product -->

   <!-- Related Product Start -->
   @include('components.detalle_producto.productosRelacionados')
   <!-- Related Product end -->

   <!-- Footer Start -->
 @include('layouts.footer')
   <!-- Footer Area End -->

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
                                               class="svg_img pro_svg" alt="" /> Agregar al carrito</button>
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
               <strong>Necesitas ayuda?</strong>
               <p>Escribenos a nuestro WhatsApp</p>
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
                   <img class="whatsapp" src="{{asset('images/common/whatsapp.png')}}" alt="whatsapp icon" />
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