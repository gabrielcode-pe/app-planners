@extends('layouts.front')
@section('title', 'Confirmación de compra')

@section('styles')
<link rel="stylesheet" href="{{asset('assets/css/checkout-form.css')}}">
@endsection

@section('content')

<div class="payment-wrapper">
    
    <div class="payment-form">
        <div class="total-pricing">
            <p>Total a pagar</p>
            <h3>S/. 100.00</h3>
        </div>
        <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active" id="personal"><strong>Datos personales</strong></li>
                <li id="payment"><strong>Información de pago</strong></li>
                <li id="confirm"><strong>Listo</strong></li>
            </ul> <!-- fieldsets -->
            <fieldset>

                

                <div class="form-card">

                    <div class="form-group">
                        <input type="text" name="fname" placeholder="Nombres" /> 
                    </div>

                    <div class="form-group">
                        <input type="text" name="lname" placeholder="Apellidos" /> 
                    </div>

                    <div class="form-group">
                        <input type="email" name="phno" placeholder="Correo electrónico" /> 
                    </div>

                    <div class="form-group">
                        <input type="text" name="phno_2" placeholder="Número de contacto" />
                    </div>
                    
                </div> 

                
                <input type="button" name="next" class="next action-button" value="Siguiente" />
            </fieldset>
            <fieldset>
                <div class="form-card">
                    
                    <div class="form-group">
                        <label class="pay">Nombre como aparece en la tarjeta*</label> 
                        <input type="text" name="holdername" placeholder="" />
                    </div>

                    <div class="form-group">
                        <label class="pay">Número de tarjeta*</label> 
                        <input type="text" name="cardno" placeholder="" />
                    </div>

                    <div class="form-group">
                        <label class="pay">CVC*</label> 
                        <input type="password" name="cvcpwd" placeholder="***" />
                    </div>

                    <div class="form-group">
                        <label class="pay">Fecha de expiración*</label>
                        <select class="list-dt" id="month" name="expmonth">
                                <option selected>Mes</option>
                                <option>Enero</option>
                                <option>Febreo</option>
                                <option>Marzo</option>
                                <option>Abril</option>
                                <option>Mayo</option>
                                <option>Junio</option>
                                <option>Julio</option>
                                <option>Agosto</option>
                                <option>Septiembre</option>
                                <option>Octubre</option>
                                <option>Noviembre</option>
                                <option>Deciembre</option>
                        </select>

                        <select class="list-dt" id="year" name="expyear">
                            <option selected>Año</option>
                        </select>

                    </div>

                </div> 
                <input type="button" name="previous" class="previous action-button-previous" value="Anterior" /> 
                <input type="button" name="make_payment" class="next action-button" value="Confirmar" />
            </fieldset>
            <fieldset>
                <div class="form-card">
                    <h2 class="fs-title text-center">Felicidades !</h2> <br><br>
                    <div class="row justify-content-center">
                        <div class="col-3"> 
                            <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> 
                        </div>
                    </div> <br><br>
                    <div class="row justify-content-center">
                        <div class="col-7 text-center">
                            <h5>La compra del curso se efectuó con éxito</h5>
                        </div>
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
   <script>
    // Culqi.publicKey = '{{config('services.culqi.public_key')}}';
    // Culqi.init();

    $(document).ready(function(){

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $(".next").click(function(){

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

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
        });

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

        $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
        });

        $(".submit").click(function(){
        return false;
        })

    });

</script>
@endsection
