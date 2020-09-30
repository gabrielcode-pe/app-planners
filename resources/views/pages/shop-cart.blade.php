@extends('layouts.front')
@section('title', 'Carrito de compras')
@section('content')
<div class="cart-courses-wrapper">
    <div class="cart-courses-content">
        <h2>DETALLES DE LA COMPRA</h2>

        <div class="cart-courses">
            <div class="cart-course-item">
                <div class="portrait">
                    <img src="{{asset('assets/images/course-image2.jpeg')}}" alt="">
                </div>
                <div class="info">
                    <h4>CONTRATOS EN LA ACTUALIDAD</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum nulla doloribus doloremque optio itaque quos.</p>
                    <div class="author">
                        <p>Por Bautista</p>
                    </div>
                </div>
                <div class="pricing">
                    <p class="amout">S/. 45.00</p>
                    <a href="#" title="Quitar del carrito"><i class="fa fa-trash"></i></a>
                </div>
            </div>

            <div class="cart-course-item">
                <div class="portrait">
                    <img src="{{asset('assets/images/course-image2.jpeg')}}" alt="">
                </div>
                <div class="info">
                    <h4>CONTRATOS EN LA ACTUALIDAD</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum nulla doloribus doloremque optio itaque quos.</p>
                    <div class="author">
                        <p>Por Bautista</p>
                    </div>
                </div>
                <div class="pricing">
                    <p class="amout">S/. 45.00</p>
                    <a href="#" title="Quitar del carrito"><i class="fa fa-trash"></i></a>
                </div>
            </div>

            <a class="general-action" href="#">Ver política de devoluciones</a>
        </div>
        <div class="cart-aside">
            <div class="sumary-header">
                <h5>Resúmen</h5>
            </div>
            <div class="sumary-body">
                <div class="item-price"><span>Total</span> <span  class="amout">S/. 90.00</span></div>

                <a href="#" class="btn btn-primary-outline">Comprar</a>

                <p class="acepted-title">Aceptamos</p>

                <div class="acepted-cards">
                    <img src="{{asset('assets/images/visa.png')}}" alt="">
                    <img src="{{asset('assets/images/master-card.png')}}" alt="">
                    <img src="{{asset('assets/images/american-express.png')}}" alt="">
                    <img src="{{asset('assets/images/cmr.png')}}" alt="">
                    <img src="{{asset('assets/images/ripley.png')}}" alt="">
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>

    $(document).ready(function(){
        renderShoppingCart();
    });

    function renderShoppingCart() {
        // Listar contenido del carrito
        if(shoppingCart.allItems.length > 0){
            
            console.log(shoppingCart.allItems);

        }else{
            console.log('Carrito vacio');
        }
    }
</script>
@endsection