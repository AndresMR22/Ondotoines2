<div class="ec-side-cart-overlay"></div>
<div id="ec-side-cart" class="ec-side-cart">
    <div class="ec-cart-inner">
        <div class="ec-cart-top">
            <div class="ec-cart-title">
                <span class="cart_title">Mi carrito</span>
                <button class="ec-close">×</button>
            </div>
            <ul class="eccart-pro-items">
                @foreach($shopping_cart->shopping_cart_details as $shopping_cart_detail)
                <li>
                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                            src="{{$shopping_cart_detail->producto->images->pluck('url')[0]}}" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="product-left-sidebar.html" class="cart_pro_title">{{$shopping_cart_detail->producto->nombre}}</a>
                        <span class="cart-price"><span>${{$shopping_cart_detail->precio}}</span> x {{$shopping_cart_detail->cantidad}}</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="{{route('shoppingCartDetail.retirar',$shopping_cart_detail)}}" class="remove">×</a>
                    </div>
                </li>
             @endforeach
              
            </ul>
        </div>
        <div class="ec-cart-bottom">
            <div class="cart-sub-total">
                <table class="table cart-table">
                    <tbody>
                        <tr>
                            <td class="text-left">Sub-Total :</td>
                            <td class="text-right">${{$shopping_cart->subtotal()}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">VAT ({{$empresa->iva}}%) :</td>
                            <td class="text-right">${{$shopping_cart->total_impuesto()}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Total :</td>
                            <td class="text-right primary-color">${{$shopping_cart->total_impuesto()+$shopping_cart->subtotal()}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart_btn">
                <a href="{{route('shoppingCart.carrito')}}" class="btn btn-primary">Ver carrito</a>
                <a href="#" class="btn btn-secondary">Pagar</a>
            </div>
        </div>
    </div>
</div>