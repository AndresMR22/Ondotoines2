<section class="section ec-fre-spe-section section-space-p" id="offers">
    <div class="container">
        <div class="row">
            @foreach($ofertasTemporales as $oferta)
            <!--  Feature Section Start -->
            <div class="ec-fre-section col-lg-6 col-md-6 col-sm-6 margin-b-30" data-animation="slideInRight">
                <div class="col-md-12 text-left">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Articulos</h2>
                        <h2 class="ec-title">Articulos</h2>
                    </div>
                </div>

                <div class="ec-fre-products">
                    <div class="ec-fs-product">
                        <div class="ec-fs-pro-inner">
                            <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                <div class="ec-fs-pro-image">
                                    <a href="product-left-sidebar.html" class="image"><img class="main-image"
                                            src="{{asset('images/product-image/1_1.jpg')}}" alt="Product" /></a>
                                    <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                        data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                            src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                            alt="" /></a>
                                </div>
                            </div>
                            <div class="ec-fs-pro-content col-lg-6 col-md-6 col-sm-6">
                                <h5 class="ec-fs-pro-title"><a href="{{route('home.detalleProducto',$oferta->id)}}">{{$oferta->nombre}}</a>
                                </h5>
                                <div class="ec-fs-pro-rating">
                                    <span class="ec-fs-rating-icon">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star"></i>
                                    </span>
                                    <span class="ec-fs-rating-text">4 Review</span>
                                </div>
                                <div class="ec-fs-price">
                                    <span class="old-price">${{$oferta->productoprecio->pvp}}</span>
                                    <span class="new-price">${{$oferta->priceDiscount($producto->id)}}</span>
                                </div>
                                <input type="hidden" id="inicio_descuento" value="{{$producto->productoprecio->inicio_descuento}}">
                                <input type="hidden" id="fin_descuento" value="{{$producto->productoprecio->fin_descuento}}">

                                <div class="countdowntimer"><span id="ec-fs-count-1"></span></div>
                                <div class="ec-fs-pro-desc">Lorem Ipsum is simply dummy text the printing and
                                    typesetting.
                                </div>
                                <div class="ec-fs-pro-book">Total Booking: <span>25</span></div>
                                <div class="ec-fs-pro-btn">
                                    <a href="#" class="btn btn-lg btn-secondary">Remind Me</a>
                                    <a href="#" class="btn btn-lg btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ec-fs-product">
                        <div class="ec-fs-pro-inner">
                            <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                <div class="ec-fs-pro-image">
                                    <a href="product-left-sidebar.html" class="image"><img class="main-image"
                                            src="{{asset('images/product-image/3_1.jpg')}}" alt="Product" /></a>
                                    <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                        data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                            src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                            alt="" /></a>
                                </div>
                            </div>
                            <div class="ec-fs-pro-content col-lg-6 col-md-6 col-sm-6">
                                <h5 class="ec-fs-pro-title"><a href="product-left-sidebar.html">Leather Purse For Women</a>
                                </h5>
                                <div class="ec-fs-pro-rating">
                                    <span class="ec-fs-rating-icon">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </span>
                                    <span class="ec-fs-rating-text">4 Review</span>
                                </div>
                                <div class="ec-fs-price">
                                    <span class="old-price">$300.00</span>
                                    <span class="new-price">$250.00</span>
                                </div>

                                <div class="countdowntimer"><span id="ec-fs-count-2"></span></div>
                                <div class="ec-fs-pro-desc">Lorem Ipsum is simply dummy text the printing and
                                    typesetting.
                                </div>
                                <div class="ec-fs-pro-book">Total Booking: <span>25</span></div>
                                <div class="ec-fs-pro-btn">
                                    <a href="#" class="btn btn-lg btn-secondary">Remind Me</a>
                                    <a href="#" class="btn btn-lg btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Feature Section End -->
            @endforeach
            <!--  Special Section Start -->
            {{-- <div class="ec-spe-section col-lg-6 col-md-6 col-sm-6" data-animation="slideInLeft">
                <div class="col-md-12 text-left">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Tiempo limite de la oferta</h2>
                        <h2 class="ec-title">Tiempo limite de la oferta</h2>
                    </div>
                </div>

                <div class="ec-spe-products">
                    <div class="ec-fs-product">
                        <div class="ec-fs-pro-inner">
                            <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                <div class="ec-fs-pro-image">
                                    <a href="product-left-sidebar.html" class="image"><img class="main-image"
                                            src="{{asset('images/product-image/8_1.jpg')}}" alt="Product" /></a>
                                    <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                        data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                            src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                            alt="" /></a>
                                </div>
                            </div>
                            <div class="ec-fs-pro-content col-lg-6 col-md-6 col-sm-6">
                                <h5 class="ec-fs-pro-title"><a href="product-left-sidebar.html">Smart watch Firebolt</a>
                                </h5>
                                <div class="ec-fs-pro-rating">
                                    <span class="ec-fs-rating-icon">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star"></i>
                                    </span>
                                    <span class="ec-fs-rating-text">4 Review</span>
                                </div>
                                <div class="ec-fs-price">
                                    <span class="old-price">$200.00</span>
                                    <span class="new-price">$180.00</span>
                                </div>
                                <div class="countdowntimer"><span id="ec-fs-count-3"></span></div>
                                <div class="ec-fs-pro-desc">Lorem Ipsum is simply dummy text the printing and
                                    typesetting.
                                </div>
                                <div class="ec-fs-pro-book">Total Booking: <span>25</span></div>
                                <div class="ec-fs-pro-btn">
                                    <a href="#" class="btn btn-lg btn-secondary">Remind Me</a>
                                    <a href="#" class="btn btn-lg btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ec-fs-product">
                        <div class="ec-fs-pro-inner">
                            <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                <div class="ec-fs-pro-image">
                                    <a href="product-left-sidebar.html" class="image"><img class="main-image"
                                            src="{{asset('images/product-image/10_1.jpg')}}" alt="Product" /></a>
                                    <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                        data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                            src="{{asset('images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                            alt="" /></a>
                                </div>
                            </div>
                            <div class="ec-fs-pro-content col-lg-6 col-md-6 col-sm-6">
                                <h5 class="ec-fs-pro-title"><a href="product-left-sidebar.html">Casual Shoes Men</a>
                                </h5>
                                <div class="ec-fs-pro-rating">
                                    <span class="ec-fs-rating-icon">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </span>
                                    <span class="ec-fs-rating-text">4 Review</span>
                                </div>
                                <div class="ec-fs-price">
                                    <span class="old-price">$120.00</span>
                                    <span class="new-price">$95.00</span>
                                </div>

                                <div class="countdowntimer"><span id="ec-fs-count-4"></span></div>
                                <div class="ec-fs-pro-desc">Lorem Ipsum is simply dummy text the printing and
                                    typesetting.
                                </div>
                                <div class="ec-fs-pro-book">Total Booking: <span>25</span></div>
                                <div class="ec-fs-pro-btn">
                                    <a href="#" class="btn btn-lg btn-secondary">Remind Me</a>
                                    <a href="#" class="btn btn-lg btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--  Special Section End -->
        </div>
    </div>
</section>