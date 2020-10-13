@extends('layouts.front')
@section('title', 'Carrito de compras')
@section('content')
<div class="cart-courses-wrapper">
    <div class="cart-courses-content" id="cart-courses-content">
        

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
            
            let coursesContainer = '';

            shoppingCart.allItems.map(itemCourse =>{
                coursesContainer += `
                    <div class="cart-course-item">
                        <div class="portrait">
                            <img src="/assets/uploads/${itemCourse.url_portrait}" alt="${itemCourse.name}">
                        </div>
                        <div class="info">
                            <h4>${itemCourse.name}</h4>
                            <p>${itemCourse.seo}</p>
                            <div class="author">
                                <p>${itemCourse.instructor.name}</p>
                            </div>
                        </div>
                        <div class="pricing">
                            <p class="amout">S/. 45.00</p>
                            <a href="#" onclick="removeItemFromCart(${itemCourse.id})" title="Quitar del carrito"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                `;
            });

            $('#cart-courses-content').html(`
                <h2>DETALLES DE LA COMPRA</h2>

                <div class="cart-courses">
                    ${coursesContainer}
                    <a class="general-action" href="#">Ver política de devoluciones</a>
                </div>
                <div class="cart-aside">
                    <div class="sumary-header">
                        <h5>Resúmen</h5>
                    </div>
                    <div class="sumary-body">
                        <div class="item-price"><span>Total</span> <span  class="amout">S/. 90.00</span></div>

                        <a href="{{route('checkout')}}" class="btn btn-primary-outline">Pagar ahora</a>

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
            `);

            console.log(shoppingCart.allItems);

        }else{

            $('#cart-courses-content').html(`<span>Carrito vacio</span>`);
            console.log('Carrito vacio');
        }
    }


    function removeItemFromCart(itemId) {
        event.preventDefault();

        shoppingCart.removeItem(itemId);

        renderShoppingCart();
        updateCouterCart();
    }
</script>
@endsection