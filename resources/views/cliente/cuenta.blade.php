<!DOCTYPE html>
<html>

@include('layouts.head')

<body>

    <div class="body">
        @include('layouts.header')

        <div role="main" class="main">

           @include('layouts.breadcrumb',['pagina'=>'Mi cuenta'])

            <div class="container py-2">

                <div class="row">
                    <div class="col-lg-3 mt-4 mt-lg-0">

                        <div class="d-flex justify-content-center mb-4">
                            <div class="profile-image-outer-container">
                                <div class="profile-image-inner-container bg-color-primary">
                                    <img src="img/avatars/avatar.jpg">
                                    <span class="profile-image-button bg-color-dark">
                                        <i class="fas fa-camera text-light"></i>
                                    </span>
                                </div>
                                <input type="file" id="file" class="profile-image-input">
                            </div>
                        </div>

                        <aside class="sidebar mt-2" id="sidebar">
                            <ul class="nav nav-list flex-column mb-5">
                                <li class="nav-item"><a class="nav-link text-dark active" href="#">Mi cuenta</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#">Compras</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Deseados</a></li>
                                <li class="nav-item"><a class="nav-link" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Cerrar sesión</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>    
                        </ul>
                        </aside>

                    </div>
                    <div class="col-lg-9">

                        <div class="overflow-hidden mb-1">
                            <h2 class="font-weight-normal text-7 mb-0"><strong
                                    class="font-weight-extra-bold">Mi</strong>Cuenta</h2>
                        </div>
                        <div class="overflow-hidden mb-4 pb-3">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>

                        <form role="form" class="needs-validation">
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Nombres</label>
                                <div class="col-lg-9">
                                    <input class="form-control" required type="text" value="John">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Apellidos</label>
                                <div class="col-lg-9">
                                    <input class="form-control" required type="text" value="Doe">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Correo electrónico</label>
                                <div class="col-lg-9">
                                    <input class="form-control" required type="email" value="email@gmail.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Empresa</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="">
                                </div>
                            </div>
                      
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Dirección</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" value="" >
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Nombre de usuario</label>
                                <div class="col-lg-9">
                                    <input class="form-control" required type="text" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Contraseña</label>
                                <div class="col-lg-9">
                                    <input class="form-control" required type="password" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Confirmar contraseña</label>
                                <div class="col-lg-9">
                                    <input class="form-control" required type="password" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-lg-9">

                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="submit" value="Guardar" class="btn btn-primary btn-modern float-right"
                                        data-loading-text="Loading...">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

        <footer id="footer">
            <div class="container">
                <div class="footer-ribbon">
                    <span>Get in Touch</span>
                </div>
                <div class="row py-5 my-4">
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <h5 class="text-3 mb-3">NEWSLETTER</h5>
                        <p class="pr-1">Keep up on our always evolving product features and technology. Enter
                            your e-mail address and subscribe to our newsletter.</p>
                        <div class="alert alert-success d-none" id="newsletterSuccess">
                            <strong>Success!</strong> You've been added to our email list.
                        </div>
                        <div class="alert alert-danger d-none" id="newsletterError"></div>
                        <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST"
                            class="mr-4 mb-3 mb-md-0">
                            <div class="input-group input-group-rounded">
                                <input class="form-control form-control-sm bg-light" placeholder="Email Address"
                                    name="newsletterEmail" id="newsletterEmail" type="text">
                                <span class="input-group-append">
                                    <button class="btn btn-light text-color-dark"
                                        type="submit"><strong>GO!</strong></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <h5 class="text-3 mb-3">LATEST TWEETS</h5>
                        <div id="tweet" class="twitter" data-plugin-tweets
                            data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                            <p>Please wait...</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                        <div class="contact-details">
                            <h5 class="text-3 mb-3">CONTACT US</h5>
                            <ul class="list list-icons list-icons-lg">
                                <li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i>
                                    <p class="m-0">234 Street Name, City Name</p>
                                </li>
                                <li class="mb-1"><i class="fab fa-whatsapp text-color-primary"></i>
                                    <p class="m-0"><a href="tel:8001234567">(800) 123-4567</a></p>
                                </li>
                                <li class="mb-1"><i class="far fa-envelope text-color-primary"></i>
                                    <p class="m-0"><a href="mailto:mail@example.com">mail@example.com</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <h5 class="text-3 mb-3">FOLLOW US</h5>
                        <ul class="social-icons">
                            <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank"
                                    title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank"
                                    title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank"
                                    title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container py-2">
                    <div class="row py-4">
                        <div
                            class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                            <a href="index.html" class="logo pr-0 pr-lg-3">
                                <img alt="Porto Website Template" src="img/logo-footer.png" class="opacity-5"
                                    height="33">
                            </a>
                        </div>
                        <div
                            class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                            <p>© Copyright 2020. All Rights Reserved.</p>
                        </div>
                        <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                            <nav id="sub-menu">
                                <ul>
                                    <li><i class="fas fa-angle-right"></i><a href="page-faq.html"
                                            class="ml-1 text-decoration-none"> FAQ's</a></li>
                                    <li><i class="fas fa-angle-right"></i><a href="sitemap.html"
                                            class="ml-1 text-decoration-none"> Sitemap</a></li>
                                    <li><i class="fas fa-angle-right"></i><a href="contact-us.html"
                                            class="ml-1 text-decoration-none"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    @include('layouts.scripts')

</body>

</html>
