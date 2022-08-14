<section class="section ec-new-product section-space-p" id="arrivals">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Nuestros Articulos</h2>
                    <h2 class="ec-title">Nuestros articulos</h2>
                    <p class="sub-title">Conoce nuestra variedad de articulos</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- New Product Content -->
            @foreach ($productos as $pos => $producto)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content" data-animation="flipInY">
                    <div class="ec-product-inner">
                        <div class="ec-pro-image-outer">
                            <div class="ec-pro-image">
                                @if (count($producto->images) > 1)
                                    <a href="product-left-sidebar.html" class="image">
                                        <img class="main-image" src="{{ $producto->images->pluck('url')[0] }}"
                                            alt="Product" />
                                        <img class="hover-image" src="{{ $producto->images->pluck('url')[1] }}"
                                            alt="Product" />
                                    </a>
                                @else
                                    <a href="product-left-sidebar.html" class="image">
                                        <img class="main-image" src="{{ $producto->images->pluck('url')[0] }}"
                                            alt="Product" />
                                        <img class="hover-image" src="{{ $producto->images->pluck('url')[0] }}"
                                            alt="Product" />
                                    </a>
                                @endif

                                <span class="flags">
                                    @if ($producto->haveDiscount($producto->id))
                                        <span class="sale">Oferta</span>
                                    @endif
                                </span>
                                <a href="{{route('home.detalleProducto',$producto->id)}}" class="quickview" data-link-action="quickview" title="Ver detalles"
                                    data-bs-toggle="modal" data-bs-target="#ec_quickview_modal{{ $pos }}"><img
                                        src="{{ asset('images/icons/quickview.svg') }}" class="svg_img pro_svg"
                                        alt="" /></a>
                                {{-- <div class="ec-pro-actions">
                                <a href="" class="ec-btn-group compare" title="Compare"><img
                                        src="{{asset('images/icons/compare.svg')}}" class="svg_img pro_svg" alt="" /></a>
                                <button title="Agregar al carrito" class="add-to-cart"><img
                                        src="{{asset('images/icons/cart.svg')}}" class="svg_img pro_svg" alt="" /> Agregar al carrito</button>
                                <a class="ec-btn-group wishlist" title="Deseados"><img
                                        src="{{asset('images/icons/wishlist.svg')}}" class="svg_img pro_svg" alt="" /></a>
                            </div> --}}
                            </div>
                        </div>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="{{route('home.detalleProducto',$producto->id)}}">{{ $producto->nombre }}</a>
                            </h5>
                            <div class="ec-pro-rating">
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star fill"></i>
                                <i class="ecicon eci-star"></i>
                            </div>
                            <span class="ec-price">
                                @if ($producto->haveDiscount($producto->id))
                                    <span class="old-price">${{ $producto->productoprecio->pvp }}</span>
                                    <span class="new-price">${{ $producto->priceDiscount($producto->id) }}</span>
                                @else
                                    <span class="new-price">${{ $producto->productoprecio->pvp }}</span>
                                @endif
                            </span>
                            <div class="ec-pro-option">
                                <div class="ec-pro-color">
                                    <span class="ec-pro-opt-label">Color</span>
                                    <ul class="ec-opt-swatch ec-change-img">
                                        @foreach ($producto->colores as $key => $color)
                                            <li class="{{ $key == 0 ? 'active' : '' }}"><a href="#"
                                                    class="ec-opt-clr-img" data-src="{{ $color->imagen->url }}"
                                                    data-src-hover="{{ $color->imagen->url }}"
                                                    data-tooltip="Orange"><span
                                                        style="background-color:{{ $color->codigo }};"></span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="ec_quickview_modal{{ $pos }}" tabindex="-1" role="dialog">
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
                                                    href="product-left-sidebar.html">{{ $producto->nombre }}</a>
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
                                            <div class="ec-quickview-qty">
                                                <div class="qty-plus-minus">
                                                    <input class="qty-input" type="text" name="ec_qtybtn"
                                                        value="1" />
                                                </div>
                                                <div class="ec-quickview-cart ">
                                                    <button class="btn btn-primary"><img
                                                            src="{{ asset('images/icons/cart.svg') }}"
                                                            class="svg_img pro_svg" alt="" /> Agregar al
                                                        carrito</button>
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
            {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content" data-animation="flipInY">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image" src="{{asset('images/product-image/11_1.jpg')}}"
                                    alt="Product" />
                                <img class="hover-image" src="{{asset('images/product-image/11_2.jpg')}}"
                                    alt="Product" />
                            </a>
                            <span class="flags">
                                <span class="new">New</span>
                            </span>
                            <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                    src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg" alt="" /></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare" title="Compare"><img
                                        src="{{asset('images/icons/compare.svg')}}" class="svg_img pro_svg" alt="" /></a>
                                <button title="Add To Cart" class="add-to-cart"><img
                                        src="{{asset('images/icons/cart.svg')}}" class="svg_img pro_svg" alt="" /> Add To
                                    Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                        src="{{asset('images/icons/wishlist.svg')}}" class="svg_img pro_svg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Classic Leather purse</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <span class="ec-price">
                            <span class="old-price">$100.00</span>
                            <span class="new-price">$80.00</span>
                        </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/11_1.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/11_1.jpg')}}"
                                            data-tooltip="Gray"><span style="background-color:#dba4ff;"></span></a>
                                    </li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/11_2.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/11_2.jpg')}}"
                                            data-tooltip="Orange"><span
                                                style="background-color:#ff4a77;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/11_3.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/11_3.jpg')}}"
                                            data-tooltip="Green"><span style="background-color:#c9ff55;"></span></a>
                                    </li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/11_4.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/11_4.jpg')}}"
                                            data-tooltip="Sky Blue"><span
                                                style="background-color:#ffcc5e;"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content" data-animation="flipInY">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image" src="{{asset('images/product-image/12_1.jpg')}}"
                                    alt="Product" />
                                <img class="hover-image" src="{{asset('images/product-image/12_2.jpg')}}"
                                    alt="Product" />
                            </a>
                            <span class="percentage">5%</span>
                            <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                    src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg" alt="" /></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare" title="Compare"><img
                                        src="{{asset('images/icons/compare.svg')}}" class="svg_img pro_svg" alt="" /></a>
                                <button title="Add To Cart" class="add-to-cart"><img
                                        src="{{asset('images/icons/cart.svg')}}" class="svg_img pro_svg" alt="" /> Add To
                                    Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                        src="{{asset('images/icons/wishlist.svg')}}" class="svg_img pro_svg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Fancy Ladies Sandal</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <span class="ec-price">
                            <span class="old-price">$100.00</span>
                            <span class="new-price">$80.00</span>
                        </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/12_1.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/12_1.jpg')}}"
                                            data-tooltip="Gray"><span style="background-color:#db9dff;"></span></a>
                                    </li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/12_2.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/12_2.jpg')}}"
                                            data-tooltip="Orange"><span
                                                style="background-color:#00ffff;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/12_3.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/12_3.jpg')}}"
                                            data-tooltip="Green"><span style="background-color:#ffa7f3;"></span></a>
                                    </li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/12_4.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/12_4.jpg')}}"
                                            data-tooltip="Sky Blue"><span
                                                style="background-color:#89ff7e;"></span></a></li>
                                </ul>
                            </div>
                            <div class="ec-pro-size">
                                <span class="ec-pro-opt-label">Size</span>
                                <ul class="ec-opt-size">
                                    <li class="active"><a href="#" class="ec-opt-sz" data-old="$50.00"
                                            data-new="$40.00" data-tooltip="Small">6</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$60.00" data-new="$50.00"
                                            data-tooltip="Medium">7</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$70.00" data-new="$60.00"
                                            data-tooltip="Large">8</a></li>
                                    <li><a href="#" class="ec-opt-sz" data-old="$80.00" data-new="$70.00"
                                            data-tooltip="Extra Large">9</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content" data-animation="flipInY">
                <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                            <a href="product-left-sidebar.html" class="image">
                                <img class="main-image" src="{{asset('images/product-image/13_1.jpg')}}"
                                    alt="Product" />
                                <img class="hover-image" src="{{asset('images/product-image/13_2.jpg')}}"
                                    alt="Product" />
                            </a>
                            <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                    src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg" alt="" /></a>
                            <div class="ec-pro-actions">
                                <a href="compare.html" class="ec-btn-group compare" title="Compare"><img
                                        src="{{asset('images/icons/compare.svg')}}" class="svg_img pro_svg" alt="" /></a>
                                <button title="Add To Cart" class="add-to-cart"><img
                                        src="{{asset('images/icons/cart.svg')}}" class="svg_img pro_svg" alt="" /> Add To
                                    Cart</button>
                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                        src="{{asset('images/icons/wishlist.svg')}}" class="svg_img pro_svg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="ec-pro-content">
                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Womens Leather Backpack</a></h5>
                        <div class="ec-pro-rating">
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star fill"></i>
                            <i class="ecicon eci-star"></i>
                        </div>
                        <span class="ec-price">
                            <span class="old-price">$100.00</span>
                            <span class="new-price">$80.00</span>
                        </span>
                        <div class="ec-pro-option">
                            <div class="ec-pro-color">
                                <span class="ec-pro-opt-label">Color</span>
                                <ul class="ec-opt-swatch ec-change-img">
                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/13_1.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/13_1.jpg')}}"
                                            data-tooltip="Gray"><span style="background-color:#deffa4;"></span></a>
                                    </li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/13_2.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/13_2.jpg')}}"
                                            data-tooltip="Orange"><span
                                                style="background-color:#ffcdbe;"></span></a></li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/13_3.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/13_3.jpg')}}"
                                            data-tooltip="Green"><span style="background-color:#ff94df;"></span></a>
                                    </li>
                                    <li><a href="#" class="ec-opt-clr-img"
                                            data-src="{{asset('images/product-image/13_4.jpg')}}"
                                            data-src-hover="{{asset('images/product-image/13_4.jpg')}}"
                                            data-tooltip="Sky Blue"><span
                                                style="background-color:#dd9bfc;"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-sm-12 shop-all-btn"><a href="shop-left-sidebar-col-3.html">Shop All Collection</a>
            </div> --}}
        </div>
    </div>
</section>
