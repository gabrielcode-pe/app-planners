@extends('layouts.front')
@section('title', 'Confirmación de compra')

@section('styles')
<link rel="stylesheet" href="{{asset('assets/css/checkout-form.css')}}">
@endsection

@section('content')

<div class="payment-wrapper">
    
    <div class="payment-form">
        <div class="error-message" id="error-message-response">
            
        </div>
        <div class="total-pricing">
            <p>Total a pagar</p>
            <h3 id="total-amout-payment">....</h3>
        </div>
        <form id="msform" method="POST">
            @csrf
            <input type="hidden" name="payment_amount" id="payment_amount">
            <div class="courses-content" id="courses-selected">
            </div>
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active" id="personal"><strong>Datos personales</strong></li>
                <li id="payment"><strong>Información de pago</strong></li>
                <li id="confirm"><strong>Listo</strong></li>
            </ul> <!-- fieldsets -->
            <fieldset>

                

                <div class="form-card">

                    <div class="row">
                        <div class="form-group">
                            <input type="text" name="first_name" class="personal-info" placeholder="Nombres" required/> 
                        </div>
    
                        <div class="form-group">
                            <input type="text" name="last_name" class="personal-info" placeholder="Apellidos" required/> 
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <input type="number" name="phone_number" class="personal-info" placeholder="Número de contacto" required/>
                        </div>
                        <div class="form-group">
                            <input type="number" name="doc_number" class="personal-info" placeholder="Número de documento (DNI)" required/>
                        </div>

                    </div>
                    <div class="form-group">
                        <input type="text" name="address_city" placeholder="Dirección" />
                    </div>

                    
                </div> 

                
                <input type="button" class="action-button" id="save-personal-info" value="Siguiente" />
            </fieldset>
            <fieldset>
                <div class="form-card">
                    
                    <div class="form-group">
                        <label class="pay">Número de tarjeta*</label> 
                        <input type="number" class="payment-info" size="20" data-culqi="card[number]" id="card[number]" required/>
                    </div>

                    <div class="row">
                        <div class="form-group">

                            <label class="pay">Fecha de expiración*</label>
                            <div class="row">
                                <input type="number" class="payment-info" size="2" data-culqi="card[exp_month]" id="card[exp_month]" placeholder="MM" required>
                                <span>/</span>
                                <input type="number" class="payment-info" size="4" data-culqi="card[exp_year]" id="card[exp_year]" placeholder="AA" required>

                            </div>
                        </div>

    
                        <div class="form-group">
                            <label class="pay">Código CVV</label> 
                            <input type="password" class="payment-info" size="4" data-culqi="card[cvv]" id="card[cvv]" required/>
                        </div>

                    </div>                    


                    <div class="form-group">
                        <label class="pay">Correo vinculado a la tarjeta*</label> 
                        <input type="email" class="payment-info" name="email" size="50" data-culqi="card[email]" id="card[email]" required/>
                    </div>
                    
                </div> 
                <input type="button" name="previous" class="previous action-button-previous" value="Anterior" /> 
                <input type="button" id="payment-confirm-button" class="action-button" value="Confirmar" />
            </fieldset>
            <fieldset>
                <div class="form-card">
                    <div class="payment-success">
                        <h2 class="fs-title">Felicidades !</h2>
                        <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> 
                        <h4 id="payment-success-message"></h4>
                        <p><small>En breve recibirá un correo electronico, revise su bandeja de entrada. </small></p>

                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    
</div>



@endsection
@section('scripts')
   <!-- Incluyendo .js de Culqi JS -->
   <script src="https://checkout.culqi.com/v2"></script>
   <script src="{{asset('assets/jquery/blockUI.js')}}"></script>
   <script>
    Culqi.publicKey = '{{config('services.culqi.public_key')}}';
    Culqi.init();

    let totalAmoutPayment = 0;
    shoppingCart.allItems.map(itemCourse =>{
        totalAmoutPayment += parseFloat(itemCourse.prices[0].amount);
        $('#courses-selected').append(`<input type="checkbox" name="courses[]" checked value="${itemCourse.name}" />`);
    });

    const errorMessageContent = $('#error-message-response');


    $('#total-amout-payment').text(`S/. ${totalAmoutPayment.toFixed(2)}`);
    $('#payment_amount').val(totalAmoutPayment);


    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $("#save-personal-info").click(function(e){

        let validInfo = true;

        $('.personal-info').each(function(){

            if(!$(this).val()){

                $(this).focus();
                validInfo = false;
                return false;
            }

        });

        if(validInfo){
            nextStep(this);

        }

    });

    function nextStep(buttonCliked) {

        current_fs = $(buttonCliked).parent();
        next_fs = $(buttonCliked).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });

            next_fs.css({'opacity': opacity});
            
            },
            duration: 600
        });
    }

    $(".previous").click(function(){

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                'display': 'none',
                'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        });


    $('#payment-confirm-button').on('click', function(e){
    
        errorMessageContent.removeClass('show');

        let validInfo = true;
        
        $('.payment-info').each(function(){

            if(!$(this).val()){

                $(this).focus();
                validInfo = false;

                return false;
            }
        });

        if(validInfo){

            $.blockUI({
                message: '<h3>Procesando pago...</h3>'
            });

            Culqi.createToken();
            
        }

        
    });



    function culqi() {

        if (Culqi.token.object === 'token') {

            const token = Culqi.token.id;
            processPaymentNow(token);
            
        }


        if(Culqi.token.object === 'error'){

                console.log(Culqi.token);

            errorMessageContent.html(`<p>${Culqi.token.user_message}</p>`);
            errorMessageContent.addClass('show');
            $.unblockUI();
        }
    }


    function processPaymentNow(tokenId) {


        const formData = $('#msform').serialize();

        $.ajax({
            url: `/process-charge/${tokenId}`,
            type: 'POST',
            dataType: 'JSON',
            data: formData,
            success: function(resp){

                console.log(resp);
                const paymetConfirmationButton = document.querySelector('#payment-confirm-button');

                $('#payment-success-message').text(resp.message);
                nextStep(paymetConfirmationButton);
                shoppingCart.removeAllItems();
                updateCounterCart();

                $.unblockUI();


            },
            error: function(err){

                const error = err.responseJSON;
                console.log(error);

                errorMessageContent.html(`<p>${error.message}</p>`);
                errorMessageContent.addClass('show');
                $.unblockUI();
            }
        });

       

    }


</script>
@endsection
