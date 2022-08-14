
 <!DOCTYPE html>
 <html lang="es">
 
@include('layouts.head')
 <body>
     {{-- <div id="ec-overlay"><span class="loader_img"></span></div> --}}
 
     <!-- Header start  -->
    @include('layouts.header')
     <!-- Header End  -->
 
     <!-- ekka Cart Start -->
   @include('layouts.minicart')
     <!-- ekka Cart End -->
 
     <!-- Main Slider Start -->
     <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
         <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
             <!-- Main slider -->
             <div class="swiper-wrapper">
                 <div class="ec-slide-item swiper-slide d-flex ec-slide-1">
                     <div class="container align-self-center">
                         <div class="row">
                             <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                 <div class="ec-slide-content slider-animation">
                                     <h1 class="ec-slide-title">Electromuebles Alexa</h1>
                                     <h2 class="ec-slide-stitle">Todo lo que necesitas para tu hogar</h2>
                                     <p>Más de 15 años de experiencia en el mercado</p>
                                     <a href="#" class="btn btn-lg btn-secondary">Pide ahora!</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="ec-slide-item swiper-slide d-flex ec-slide-2">
                     <div class="container align-self-center">
                         <div class="row">
                             <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                 <div class="ec-slide-content slider-animation">
                                     <h1 class="ec-slide-title">Electromuebles Alexa</h1>
                                     {{-- <h2 class="ec-slide-stitle">De todo para tu hogar</h2>
                                     <p></p>
                                     <a href="#" class="btn btn-lg btn-secondary">Ordena ahora!</a> --}}
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="swiper-pagination swiper-pagination-white"></div>
             <div class="swiper-buttons">
                 <div class="swiper-button-next"></div>
                 <div class="swiper-button-prev"></div>
             </div>
         </div>
     </div>
     <!-- Main Slider End -->
 
     <!-- Product tab Area Start -->
     <section class="section ec-product-tab section-space-p" id="collection">
         <div class="container">
             <div class="row">
                 <div class="col-md-12 text-center">
                     <div class="section-title">
                         <h2 class="ec-bg-title">Nuestros artículos</h2>
                         <h2 class="ec-title">Nuestros artículos</h2>
                         <p class="sub-title"></p>
                     </div>
                 </div>
 
                 <!-- Tab Start -->
                 <div class="col-md-12 text-center">
                     <ul class="ec-pro-tab-nav nav justify-content-center">
                        @foreach($categorias as $key => $categoria)
                         <li class="nav-item"><a class="nav-link {{$key=='0'?'active':''}}" data-bs-toggle="tab" href="#tab-{{$categoria->nombre}}">{{$categoria->nombre}}</a></li>
                         {{-- <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-men">For
                                 Men</a></li>
                         <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-women">For
                                 Women</a></li>
                         <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-child">For
                                 Children</a></li> --}}
                        @endforeach
                     </ul>
                 </div>
                 <!-- Tab End -->
             </div>
             <div class="row">
                 <div class="col">
                     <div class="tab-content">

                         <!-- 1st Product tab start -->
                         @foreach($categorias as $key => $categoria)
                         <div class="tab-pane fade show {{$key=='0'?'active':''}}" id="tab-{{$categoria->nombre}}">
                             <div class="row">

                                @if(count($categoria->productos)>0)
                                 <!-- Product Content -->
                                 @foreach($categoria->productos as $posi => $producto)
                               
                                @if($producto->deleted_at == null)
                                 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content" data-animation="fadeIn">
                                     <div class="ec-product-inner">
                                         <div class="ec-pro-image-outer">
                                             <div class="ec-pro-image">
                                                @if(count($producto->images)>1)
                                                 <a href="product-left-sidebar.html" class="image">
                                                     <img class="main-image"
                                                         src="{{$producto->images->pluck('url')[0]}}" alt="Product" />
                                                     <img class="hover-image"
                                                         src="{{$producto->images->pluck('url')[1]}}" alt="Product" />
                                                 </a>
                                                 @else 
                                                 <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image"
                                                        src="{{$producto->images->pluck('url')[0]}}" alt="Product" />
                                                    <img class="hover-image"
                                                        src="{{$producto->images->pluck('url')[0]}}" alt="Product"/>
                                                </a>

                                                 @endif
                                            @if($producto->haveDiscount($producto->id))
                                                 <span class="percentage">{{floatval($producto->productoprecio->descuento)}}%</span>
                                            @endif
                                                 <a href="{{route('home.detalleProducto',$producto->id)}}" class="quickview" data-link-action="quickview"
                                                     title="Ver detalles" data-bs-toggle="modal"
                                                     data-bs-target="#ec_quickview_modalProductoCategoria{{$posi}}"><img
                                                         src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                                         alt="" /></a>
                                                 {{-- <div class="ec-pro-actions">
                                                     <a href="compare.html" class="ec-btn-group compare"
                                                         title="Compare"><img src="{{asset('images/icons/compare.svg')}}"
                                                             class="svg_img pro_svg" alt="" /></a>
                                                     <button title="Add To Cart" class="add-to-cart"><img
                                                             src="{{asset('images/icons/cart.svg')}}" class="svg_img pro_svg"
                                                             alt="" /> Agregar al carrito</button>
                                                     <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                             src="{{asset('images/icons/wishlist.svg')}}"
                                                             class="svg_img pro_svg" alt="" /></a>
                                                 </div> --}}
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
                                                        @foreach($producto->colores as $key => $color)
                                                         <li class="{{$key==0 ? 'active' : ''}}"><a href="#" class="ec-opt-clr-img"
                                                                 data-src="{{$color->imagen->url}}"
                                                                 data-src-hover="{{$color->imagen->url}}"
                                                                 data-tooltip="Gray"><span
                                                                     style="background-color:{{$color->codigo}};"></span></a></li>
                                                        @endforeach
                                                       
                                                     </ul>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="modal fade" id="ec_quickview_modalProductoCategoria{{ $posi }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="btn-close qty_close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-5 col-sm-12 col-xs-12">
                                                        <!-- Swiper -->
                                                        <div class="qty-product-cover">
                                                            @foreach ($producto->images as $imagen)
                                                                <div class="qty-slide">
                                                                    <img class="img-responsive" src="{{ $imagen->url }}"
                                                                        alt="">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="qty-nav-thumb">
                                                            @foreach ($producto->images as $imagen)
                                                                <div class="qty-slide">
                                                                    <img class="img-responsive" src="{{ $imagen->url }}"
                                                                        alt="">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7 col-sm-12 col-xs-12">
                                                        <div class="quickview-pro-content">
                                                            <h5 class="ec-quick-title"><a
                                                                    href="{{route('home.detalleProducto',$producto->id)}}">{{ $producto->nombre }}</a>
                                                            </h5>
                                                            <div class="ec-quickview-rating">
                                                                <i class="ecicon eci-star fill"></i>
                                                                <i class="ecicon eci-star fill"></i>
                                                                <i class="ecicon eci-star fill"></i>
                                                                <i class="ecicon eci-star fill"></i>
                                                                <i class="ecicon eci-star"></i>
                                                            </div>
                
                                                            <div class="ec-quickview-desc">{{ $producto->descripcion }}</div>
                                                            <div class="ec-quickview-price">
                                                                @if ($producto->haveDiscount($producto->id))
                                                                    <span
                                                                        class="old-price">${{ $producto->productoprecio->pvp }}</span>
                                                                    <span
                                                                        class="new-price">${{ $producto->priceDiscount($producto->id) }}</span>
                                                                @else
                                                                    <span
                                                                        class="new-price">${{ $producto->productoprecio->pvp }}</span>
                                                                @endif
                                                            </div>
                
                                                            <div class="ec-pro-variation">
                                                                <div class="ec-pro-variation-inner ec-pro-variation-color">
                                                                    <span>Color</span>
                                                                    <div class="ec-pro-color">
                                                                        <ul class="ec-opt-swatch">
                                                                            @foreach ($producto->colores as $color)
                                                                                <li><span
                                                                                        style="background-color:{{ $color->codigo }};"></span>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                
                                                            </div>
                                                            <form action="{{route('shopping_cart_details.store')}}" id="formAddCar{{$producto->id}}" method="POST" >
                                                                @csrf
                                                            <div class="ec-quickview-qty">
                                                                <div class="qty-plus-minus">
                                                                    <input class="qty-input" type="number" name="cantidad"
                                                                        value="1" />
                                                                    
                                                                </div>
                                                                <input type="hidden" name="producto_id" value="{{$producto->id}}" class="d-none">
                                                                <div class="ec-quickview-cart ">
                                                                    <a onclick="agregarAlCarrito({{$producto->id}});" class="btn btn-primary"><img
                                                                            src="{{ asset('images/icons/cart.svg') }}"
                                                                            class="svg_img pro_svg" alt="" />{{$producto->id}} Agregar al
                                                                        carrito</a>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                               @endif
                             @endforeach
                             @else
                             <div class="text-center my-5" >
                                <h2 class="ec-title">No hay articulos disponibles en esta categoría</h2>
                             </div>
                                 @endif
                                 {{-- <div class="col-sm-12 shop-all-btn"><a href="shop-left-sidebar-col-3.html">Shop All Collection</a></div> --}}
                             </div>
                         </div>
                         <!-- ec 1st Product tab end -->
                         @endforeach
                         <!-- ec 2nd Product tab start -->
                         <div class="tab-pane fade" id="tab-pro-for-men">
                             <div class="row">
                                 <!-- Product Content -->
                                 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content">
                                     <div class="ec-product-inner">
                                         <div class="ec-pro-image-outer">
                                             <div class="ec-pro-image">
                                                 <a href="product-left-sidebar.html" class="image">
                                                     <img class="main-image"
                                                         src="{{asset('images/product-image/6_1.jpg')}}" alt="Product" />
                                                     <img class="hover-image"
                                                         src="{{asset('images/product-image/6_2.jpg')}}" alt="Product" />
                                                 </a>
                                                 <span class="percentage">20%</span>
                                                 <a href="#" class="quickview" data-link-action="quickview"
                                                     title="Quick view" data-bs-toggle="modal"
                                                     data-bs-target="#ec_quickview_modal"><img
                                                         src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                                         alt="" /></a>
                                                 <div class="ec-pro-actions">
                                                     <a href="compare.html" class="ec-btn-group compare"
                                                         title="Compare"><img src="{{asset('images/icons/compare.svg')}}"
                                                             class="svg_img pro_svg" alt="" /></a>
                                                     <button title="Add To Cart" class="add-to-cart"><img
                                                             src="{{asset('images/icons/cart.svg')}}" class="svg_img pro_svg"
                                                             alt="" /> Add To Cart</button>
                                                     <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                             src="{{asset('images/icons/wishlist.svg')}}"
                                                             class="svg_img pro_svg" alt="" /></a>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="ec-pro-content">
                                             <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Round Neck T-Shirt</a></h5>
                                             <div class="ec-pro-rating">
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star"></i>
                                             </div>
                                             <span class="ec-price">
                                                 <span class="old-price">$30.00</span>
                                                 <span class="new-price">$25.00</span>
                                             </span>
                                             <div class="ec-pro-option">
                                                 <div class="ec-pro-color">
                                                     <span class="ec-pro-opt-label">Color</span>
                                                     <ul class="ec-opt-swatch ec-change-img">
                                                         <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                 data-src="{{asset('images/product-image/6_1.jpg')}}"
                                                                 data-src-hover="{{asset('images/product-image/6_1.jpg')}}"
                                                                 data-tooltip="Gray"><span
                                                                     style="background-color:#e8c2ff;"></span></a></li>
                                                         <li><a href="#" class="ec-opt-clr-img"
                                                                 data-src="{{asset('images/product-image/6_2.jpg')}}"
                                                                 data-src-hover="{{asset('images/product-image/6_2.jpg')}}"
                                                                 data-tooltip="Orange"><span
                                                                     style="background-color:#9cfdd5;"></span></a></li>
                                                     </ul>
                                                 </div>
                                                 {{-- <div class="ec-pro-size">
                                                     <span class="ec-pro-opt-label">Size</span>
                                                     <ul class="ec-opt-size">
                                                         <li class="active"><a href="#" class="ec-opt-sz"
                                                                 data-old="$25.00" data-new="$20.00"
                                                                 data-tooltip="Small">S</a></li>
                                                         <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                                                 data-new="$22.00" data-tooltip="Medium">M</a></li>
                                                         <li><a href="#" class="ec-opt-sz" data-old="$30.00"
                                                                 data-new="$25.00" data-tooltip="Large">X</a></li>
                                                         <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                                 data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                                     </ul>
                                                 </div> --}}
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                           
                                 <div class="col-sm-12 shop-all-btn"><a href="shop-left-sidebar-col-3.html">Shop All Collection</a></div>
                             </div>
                         </div>
                         <!-- ec 2nd Product tab end -->
                         <!-- ec 3rd Product tab start -->
                         <div class="tab-pane fade" id="tab-pro-for-women">
                             <div class="row">
                                 <!-- Product Content -->                                
                                 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content">
                                     <div class="ec-product-inner">
                                         <div class="ec-pro-image-outer">
                                             <div class="ec-pro-image">
                                                 <a href="product-left-sidebar.html" class="image">
                                                     <img class="main-image"
                                                         src="{{asset('images/product-image/9_1.jpg')}}" alt="Product" />
                                                     <img class="hover-image"
                                                         src="{{asset('images/product-image/9_2.jpg')}}" alt="Product" />
                                                 </a>
                                                 <span class="percentage">20%</span>
                                                 <span class="flags">
                                                     <span class="sale">Sale</span>
                                                 </span>
                                                 <a href="#" class="quickview" data-link-action="quickview"
                                                     title="Quick view" data-bs-toggle="modal"
                                                     data-bs-target="#ec_quickview_modal"><img
                                                         src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                                         alt="" /></a>
                                                 <div class="ec-pro-actions">
                                                     <a href="compare.html" class="ec-btn-group compare"
                                                         title="Compare"><img src="{{asset('images/icons/compare.svg')}}"
                                                             class="svg_img pro_svg" alt="" /></a>
                                                     <button title="Add To Cart" class="add-to-cart"><img
                                                             src="{{asset('images/icons/cart.svg')}}" class="svg_img pro_svg"
                                                             alt="" /> Add To Cart</button>
                                                     <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                             src="{{asset('images/icons/wishlist.svg')}}"
                                                             class="svg_img pro_svg" alt="" /></a>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="ec-pro-content">
                                             <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Canvas Shoes for Men</a></h5>
                                             <div class="ec-pro-rating">
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star"></i>
                                             </div>
                                             <span class="ec-price">
                                                 <span class="old-price">$30.00</span>
                                                 <span class="new-price">$25.00</span>
                                             </span>
                                             <div class="ec-pro-option">
                                                 <div class="ec-pro-color">
                                                     <span class="ec-pro-opt-label">Color</span>
                                                     <ul class="ec-opt-swatch ec-change-img">
                                                         <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                 data-src="{{asset('images/product-image/9_1.jpg')}}"
                                                                 data-src-hover="{{asset('images/product-image/9_1.jpg')}}"
                                                                 data-tooltip="Gray"><span
                                                                     style="background-color:#21b7fc;"></span></a></li>
                                                         <li><a href="#" class="ec-opt-clr-img"
                                                                 data-src="{{asset('images/product-image/9_2.jpg')}}"
                                                                 data-src-hover="{{asset('images/product-image/9_2.jpg')}}"
                                                                 data-tooltip="Orange"><span
                                                                     style="background-color:#1df0ff;"></span></a></li>
                                                         <li><a href="#" class="ec-opt-clr-img"
                                                                 data-src="{{asset('images/product-image/9_3.jpg')}}"
                                                                 data-src-hover="{{asset('images/product-image/9_3.jpg')}}"
                                                                 data-tooltip="Green"><span
                                                                     style="background-color:#94f7a1;"></span></a></li>
                                                     </ul>
                                                 </div>
                                                 {{-- <div class="ec-pro-size">
                                                     <span class="ec-pro-opt-label">Size</span>
                                                     <ul class="ec-opt-size">
                                                         <li class="active"><a href="#" class="ec-opt-sz"
                                                                 data-old="$30.00" data-new="$25.00"
                                                                 data-tooltip="Small">S</a></li>
                                                         <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                                 data-new="$27.00" data-tooltip="Medium">M</a></li>
                                                         <li><a href="#" class="ec-opt-sz" data-old="$40.00"
                                                                 data-new="$30.00" data-tooltip="Large">X</a></li>
                                                         <li><a href="#" class="ec-opt-sz" data-old="$45.00"
                                                                 data-new="$35.00" data-tooltip="Extra Large">XL</a></li>
                                                     </ul>
                                                 </div> --}}
                                             </div>
                                         </div>
                                     </div>
                                 </div> 
                                 <div class="col-sm-12 shop-all-btn"><a href="shop-left-sidebar-col-3.html">Shop All Collection</a></div>
                             </div>
                         </div>
                         <!-- ec 3rd Product tab end -->
                         <!-- ec 4th Product tab start -->
                         <div class="tab-pane fade" id="tab-pro-for-child">
                             <div class="row">
                                 <!-- Product Content -->                                
                                 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content">
                                     <div class="ec-product-inner">
                                         <div class="ec-pro-image-outer">
                                             <div class="ec-pro-image">
                                                 <a href="product-left-sidebar.html" class="image">
                                                     <img class="main-image"
                                                         src="{{asset('images/product-image/1_1.jpg')}}" alt="Product" />
                                                     <img class="hover-image"
                                                         src="{{asset('images/product-image/1_2.jpg')}}" alt="Product" />
                                                 </a>
                                                 <span class="percentage">20%</span>
                                                 <span class="flags">
                                                     <span class="sale">Sale</span>
                                                 </span>
                                                 <a href="#" class="quickview" data-link-action="quickview"
                                                     title="Quick view" data-bs-toggle="modal"
                                                     data-bs-target="#ec_quickview_modal"><img
                                                         src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                                         alt="" /></a>
                                                 <div class="ec-pro-actions">
                                                     <a href="compare.html" class="ec-btn-group compare"
                                                         title="Compare"><img src="{{asset('images/icons/compare.svg')}}"
                                                             class="svg_img pro_svg" alt="" /></a>
                                                     <button title="Add To Cart" class="add-to-cart"><img
                                                             src="{{asset('images/icons/cart.svg')}}" class="svg_img pro_svg"
                                                             alt="" /> Add To Cart</button>
                                                     <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                             src="{{asset('images/icons/wishlist.svg')}}"
                                                             class="svg_img pro_svg" alt="" /></a>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="ec-pro-content">
                                             <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Cute Baby Toy's</a></h5>
                                             <div class="ec-pro-rating">
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star fill"></i>
                                                 <i class="ecicon eci-star"></i>
                                             </div>
                                             <span class="ec-price">
                                                 <span class="old-price">$40.00</span>
                                                 <span class="new-price">$30.00</span>
                                             </span>
                                             <div class="ec-pro-option">
                                                 <div class="ec-pro-color">
                                                     <span class="ec-pro-opt-label">Color</span>
                                                     <ul class="ec-opt-swatch ec-change-img">
                                                         <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                 data-src="{{asset('images/product-image/1_1.jpg')}}"
                                                                 data-src-hover="{{asset('images/product-image/1_1.jpg')}}"
                                                                 data-tooltip="Gray"><span
                                                                     style="background-color:#90cdf7;"></span></a></li>
                                                         <li><a href="#" class="ec-opt-clr-img"
                                                                 data-src="{{asset('images/product-image/1_2.jpg')}}"
                                                                 data-src-hover="{{asset('images/product-image/1_2.jpg')}}"
                                                                 data-tooltip="Orange"><span
                                                                     style="background-color:#ff3b66;"></span></a></li>
                                                         <li><a href="#" class="ec-opt-clr-img"
                                                                 data-src="{{asset('images/product-image/1_3.jpg')}}"
                                                                 data-src-hover="{{asset('images/product-image/1_3.jpg')}}"
                                                                 data-tooltip="Green"><span
                                                                     style="background-color:#ffc476;"></span></a></li>
                                                         <li><a href="#" class="ec-opt-clr-img"
                                                                 data-src="{{asset('images/product-image/1_4.jpg')}}"
                                                                 data-src-hover="{{asset('images/product-image/1_4.jpg')}}"
                                                                 data-tooltip="Sky Blue"><span
                                                                     style="background-color:#1af0ba;"></span></a></li>
                                                     </ul>
                                                 </div>
                                                 <div class="ec-pro-size">
                                                     <span class="ec-pro-opt-label">Size</span>
                                                     <ul class="ec-opt-size">
                                                         <li class="active"><a href="#" class="ec-opt-sz"
                                                                 data-old="$40.00" data-new="$30.00"
                                                                 data-tooltip="Small">S</a></li>
                                                         <li><a href="#" class="ec-opt-sz" data-old="$50.00"
                                                                 data-new="$40.00" data-tooltip="Medium">M</a></li>
                                                     </ul>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             
                                 
                                 <div class="col-sm-12 shop-all-btn"><a href="shop-left-sidebar-col-3.html">Shop All Collection</a></div>
                             </div>
                         </div>
                         <!-- ec 4th Product tab end -->
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- ec Product tab Area End -->
 
     <!--  Category Section Start -->
     {{-- @include('components.index.categorias') --}}
     <!-- Category Section End -->
 
     @if(isset($ofertasTemporales))
     <!--  Feature & Special Section Start -->
     @include('components.index.ofertasTemporales')
     <!-- Feature & Special Section End -->
     @endif
     
     <!--  services Section Start -->
     @include('components.index.servicios')
     <!--services Section End -->

 
     <!-- New Product Start -->
     @include('components.index.productos')
     <!-- New Product end -->
 
     {{-- <!-- ec testmonial Start -->
     @include('components.index.testimonios')
     <!-- ec testmonial end -->
 
     <!-- Ec Brand Section Start -->
     @include('components.index.marcas')
     <!-- Ec Brand Section End --> --}}
 
     <!-- Ec Instagram Start -->
     @include('components.index.sectionInstagram')
     <!-- Ec Instagram End -->
 
     <!-- Footer Start -->
    @include('layouts.footer')
     <!-- Footer Area End -->
 
   
 
     <!-- Newsletter Modal Start -->
     {{-- <div id="ec-popnews-bg"></div>
     <div id="ec-popnews-box">
         <div id="ec-popnews-close"><i class="ecicon eci-close"></i></div>
         <div class="row">
             <div class="col-md-6 disp-no-767">
                 <img src="{{asset('images/banner/newsletter.png')}}" alt="newsletter">
             </div>
             <div class="col-md-6">
                 <div id="ec-popnews-box-content">
                     <h2>Subscribe Newsletter</h2>
                     <p>Subscribe the ekka ecommerce to get in touch and get the future update. </p>
                     <form id="ec-popnews-form" action="#" method="post">
                         <input type="email" name="newsemail" placeholder="Email Address" required />
                         <button type="button" class="btn btn-primary" name="subscribe">Subscribe</button>
                     </form>
                 </div>
             </div>
         </div>
     </div> --}}
     <!-- Newsletter Modal end -->
 
     <!-- Footer navigation panel for responsive display -->
     <div class="ec-nav-toolbar">
         <div class="container">
             <div class="ec-nav-panel">
                 <div class="ec-nav-panel-icons">
                     <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><img
                             src="{{asset('images/icons/menu.svg')}}" class="svg_img header_svg" alt="icon" /></a>
                 </div>
                 <div class="ec-nav-panel-icons">
                     <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><img
                             src="{{asset('images/icons/cart.svg')}}" class="svg_img header_svg" alt="icon" /><span
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
 
     <!-- Recent Purchase Popup  -->
     {{-- <div class="recent-purchase">
         <img src="{{asset('images/product-image/1.jpg')}}" alt="payment image">
         <div class="detail">
             <p>Someone in new just bought</p>
             <h6>stylish baby shoes</h6>
             <p>10 Minutes ago</p>
         </div>
         <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
     </div> --}}
     <!-- Recent Purchase Popup end -->
 
     <!-- Cart Floating Button -->
     <div class="ec-cart-float">
         <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
             <div class="header-icon"><img src="{{asset('images/icons/cart.svg')}}" class="svg_img header_svg" alt="cart" />
             </div>
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
                                     <span>Sahar</span>
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
                   
                   
                 </ul>
             </div>
         </div>
         <!--/ End Floating Panel Container -->
         <!-- Start Right Floating Button-->
         <div class="ec-right-bottom">
             <div class="ec-box">
                 <div class="ec-button rotateBackward">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=593988703045&text=Me%20interesa%20saber%20m%C3%A1s%20sobre%20los%20%C3%A1rticulos%20de%20la%20tienda">
                        <img class="whatsapp" src="{{asset('images/common/whatsapp.png')}}" alt="whatsapp icon">
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
             <img alt="icon" src="{{asset('images/common/settings.png')}}">
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