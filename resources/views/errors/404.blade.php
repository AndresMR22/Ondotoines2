<!DOCTYPE html>
<html>
@include('layouts.head')

<body>

    <div class="body">
        @include('layouts.header')

        <div role="main" class="main">

           @include('layouts.breadcrumb',['pagina'=>'Página no encontrada'])

            <div class="container">

                <section class="http-error">
                    <div class="row justify-content-center py-3">
                        <div class="col-md-7 text-center">
                            <div class="http-error-main">
                                <h2>Error 404!</h2>
                                <p>Lo sentimos, la página que estas buscando no ha sido encontrada.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4 mt-md-0">
                            <h4 class="text-primary">Aquí tienes algunas sugerencias</h4>
                            <ul class="nav nav-list flex-column">
                                <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Tienda</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Registrarse</a></li>
                                <li class="nav-item"><a class="nav-link" href="">Contactanos</a></li>
                            
                            </ul>
                        </div>
                    </div>
                </section>

            </div>

        </div>

       @include('layouts.footer')

    </div>

   @include('layouts.scripts')

</body>

</html>
