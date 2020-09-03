<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout culqi test</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/checkout-form.css')}}">
</head>
<body>
    
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>S/. 45.00</strong></h2>
                    <p>Curso de Marketing digital para empresas</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="personal"><strong>Personal</strong></li>
                                    <li id="payment"><strong>Pago</strong></li>
                                    <li id="confirm"><strong>Listo</strong></li>
                                </ul> <!-- fieldsets -->
                                <fieldset>

                                    

                                    <div class="form-card">
                                        <h2 class="fs-title">Datos personales</h2> 
                                        
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <input type="text" name="fname" placeholder="Nombres" /> 
                                            </div>
                                            <div class="col-xs-12 col-md-6">
                                                <input type="text" name="lname" placeholder="Apellidos" /> 
                                            </div>
                                        </div>
                                        <input type="email" name="phno" placeholder="Correo electrónico" /> 
                                        <input type="text" name="phno_2" placeholder="Número de contacto" />
                                    </div> 

                                    
                                    <input type="button" name="next" class="next action-button" value="Siguiente" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Información de pago</h2>
                                        <div class="radio-group">
                                            <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px"></div>
                                            <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px"></div> <br>
                                        </div> <label class="pay">Card Holder Name*</label> <input type="text" name="holdername" placeholder="" />
                                        <div class="row">
                                            <div class="col-9"> <label class="pay">Card Number*</label> <input type="text" name="cardno" placeholder="" /> </div>
                                            <div class="col-3"> <label class="pay">CVC*</label> <input type="password" name="cvcpwd" placeholder="***" /> </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3"> <label class="pay">Expiry Date*</label> </div>
                                            <div class="col-9"> <select class="list-dt" id="month" name="expmonth">
                                                    <option selected>Month</option>
                                                    <option>January</option>
                                                    <option>February</option>
                                                    <option>March</option>
                                                    <option>April</option>
                                                    <option>May</option>
                                                    <option>June</option>
                                                    <option>July</option>
                                                    <option>August</option>
                                                    <option>September</option>
                                                    <option>October</option>
                                                    <option>November</option>
                                                    <option>December</option>
                                                </select> <select class="list-dt" id="year" name="expyear">
                                                    <option selected>Year</option>
                                                </select> </div>
                                        </div>
                                    </div> 
                                    <input type="button" name="previous" class="previous action-button-previous" value="Anterior" /> 
                                    <input type="button" name="make_payment" class="next action-button" value="Confirmar" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Felicidades !</h2> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
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
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
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
</body>
</html>