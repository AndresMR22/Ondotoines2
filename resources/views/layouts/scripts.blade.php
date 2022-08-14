<script src="{{asset('js/vendor/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/vendor/popper.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('js/vendor/modernizr-3.11.2.min.js')}}"></script>

<!--Plugins JS-->
<script src="{{asset('js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('js/plugins/countdownTimer.min.js')}}"></script>
<script src="{{asset('js/plugins/scrollup.js')}}"></script>
<script src="{{asset('js/plugins/jquery.zoom.min.js')}}"></script>
<script src="{{asset('js/plugins/slick.min.js')}}"></script>
<script src="{{asset('js/plugins/infiniteslidev2.js')}}"></script>
<script src="{{asset('js/vendor/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery.sticky-sidebar.js')}}"></script>
<!-- Google translate Js -->
<script src="{{asset('js/vendor/google-translate.js')}}"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
    function ordenar(){
    document.getElementById("orden").value;
    document.getElementById('ordenar-form').submit();
}

function seleccionarSubcategoria(subcategoria_id)//header
{
    document.getElementById('')
}

function agregarAlCarrito(producto_id)
{
    var form = document.getElementById('formAddCar'+producto_id);
    console.log(form)
}

</script>
<!-- Main Js -->
<script src="{{asset('js/vendor/index.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

