<section class="section ec-category-section section-space-p" id="categories">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Nuestra colección</h2>
                    <h2 class="ec-title">Categorías</h2>
                    <p class="sub-title">Conoce nuestras categorías</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!--Category Nav Start -->
            <div class="col-lg-3">
                <ul class="ec-cat-tab-nav nav">
                    @foreach($categorias as $key => $categoria)
                    @if(isset($productoscount[$key]))
                    <li class="cat-item"><a class="cat-link {{$key == 0 ? 'active':''}}" data-bs-toggle="tab" href="#tab-cat-1">
                            <div class="cat-icons">
                                @if(isset($categoria->imagen))
                                <img class="cat-icon" src="{{$categoria->imagen->url}}"
                                    alt="cat-icon">
                                <img class="cat-icon-hover" src="{{$categoria->imagen->url}}"
                                    alt="cat-icon">
                                    @else
                                    <img class="cat-icon" src="{{asset('images/icons/cat_1_1.png')}}"
                                    alt="cat-icon">
                                <img class="cat-icon-hover" src="{{asset('images/icons/cat_1_1.png')}}"
                                    alt="cat-icon">
                                    @endif
                                </div>
                              
                            <div class="cat-desc"><span>{{$categoria->nombre}}</span><span>{{$productoscount[$key]->producto_count}} productos</span></div>
                           
                            {{-- <div class="cat-desc"><span>{{$categoria->nombre}}</span><span>0 productos</span></div>
                            @endif --}}
                        </a>
                    </li>
                    @endif
                    @endforeach
                    </ul>

            </div>
            <!-- Category Nav End -->
            <!--Category Tab Start -->
            <div class="col-lg-9">
                <div class="tab-content">
                    <!-- 1st Category tab end -->
                    @foreach($categorias as $key => $categoria)
                    @if(isset($productoscount[$key]))
                    <div class="tab-pane fade show {{$key == 0 ? 'active':''}}" id="tab-cat-1">
                        <div class="row">
                            @if($categoria->nombre =='Electrodomesticos')
                            <img src="{{asset('images/logo/banner6.png')}}" alt="" />
                            @endif
                            @if($categoria->nombre =='Muebles')
                            <img src="{{asset('images/logo/banner9.jpg')}}" alt="" />
                            @endif
                            @if($categoria->nombre =='Plasticos')
                            <img src="{{asset('images/logo/banner4.jpg')}}" alt="" />
                            @endif
                            @if($categoria->nombre =='Varios')
                            <img src="{{asset('images/logo/banner2.png')}}" alt="" />
                            @endif
                        </div>
                        <span class="panel-overlay">
                            <a href="{{route('home.articulosByCategoria',$categoria->id)}}" class="btn btn-primary">Ver articulos</a>
                        </span>
                    </div>
                    @endif
                    @endforeach
                    <!-- 1st Category tab end -->
                    
                   
                  
                </div>
                <!-- Category Tab End -->
            </div>
        </div>
    </div>
</section>