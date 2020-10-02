@extends('layouts.front')
@section('title')
Titulo del curso
@endsection
@section('content')
<div class="course-detail-wrapper">

    <div class="course-detail-content">
        <h2>INFORMACIÓN DEL CURSO</h2>

        <div class="course-detail" id="course-initiation-date" data-coursestart="2020-12-10">
            <div class="preview-video">
                <iframe width="100%" height="300"
                    src="https://www.youtube.com/embed/wHDVX2E8nLY">
                </iframe>
            </div>
            <h3 class="title">CONTRAROS EN LA ACTUALIDAD</h3>
            <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae ullam quaerat nobis minus debitis sint eum dicta omnis saepe quidem.</p>

            <h5 class="features-title">LO QUE APRENDERÁS</h5>
            <ul class="features">
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, commodi.</li>
            </ul>

            <h5 class="features-title">MÓDULOS</h5>
            <div class="course-modules">
                <div class="module-item">
                    <div class="header-module">
                        <h4>Módulo 1</h4>
                        <span class="collapse-dow-icon fa fa-angle-down"></span>
                    </div>
                    <div class="collapse-module">
                        <div class="content">
                            <div class="info">
                                <img src="{{asset('assets/images/common-image.jpeg')}}" alt="">
                            </div>
                            <div class="duration-time">
                                <p>05:35 <span class="fa fa-play"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="module-item">
                    <div class="header-module">
                        <h4>Módulo 2</h4>
                        <span class="collapse-dow-icon fa fa-angle-down"></span>
                    </div>
                    <div class="collapse-module">
                        <div class="content">
                            <div class="info">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni temporibus, atque porro et cum earum quam consectetur fugit placeat fuga, corrupti praesentium minus consequuntur, perspiciatis odit eveniet sit rerum. Nesciunt?</p>
                            </div>
                            <div class="duration-time">
                                <p>05:35 <span class="fa fa-play"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <a class="general-action" href="{{route('frequent.questions')}}">Ver preguntas frecuentes</a>
            

        </div>
        <div class="course-aside">
            <div class="course-price">
                <p class="amout">S/. 45.00</p>
                <a href="#" class="btn btn-primary-outline">Comprar ahora</a>
                <a href="#" class="btn btn-primary-outline">Agregar al carrito</a>

            </div>

            <div class="course-content">
                <h5>Este curso incluye</h5>
                <ul>
                    <li><i class="fa fa-play-circle-o"></i>10 Capítulos</li>
                    <li><i class="fa fa-file-text-o"></i>8 Ejercicios</li>
                    <li><i class="fa fa-download"></i>Descargas</li>
                    <li><i class="fa fa-lock"></i>Acceso completo</li>
                </ul>
            </div>
            <div class="preview-author">
                <h5>SOBRE EL AUTOR</h5>
                <div class="avatar">
                    <img src="{{asset('assets/images/author1.jpg')}}" alt="">
                </div>
                <div class="bio-preview">
                    <h6 class="fullname">Javier Bautista</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste fuga et officia architecto aliquam deleniti atque expedita reprehenderit, explicabo tempora.</p>
                    <a href="#">Ver más</a>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="count-down-wrapper" id="count-down-wrapper">
    <div class="column-item">
        <p>Quedan 12 plazas</p>
    </div>
    <div class="column-item">
        <div class="counter-content">
            <div class="count">
                <h5 id="countdown-day">00</h5>
                <p>Días</p>
            </div>
            <div class="count">
                <h5 id="countdown-hours">00</h5>
                <p>Horas</p>
            </div>
            <div class="count">
                <h5 id="countdown-minutes">00</h5>
                <p>Minutos</p>
            </div>
            <div class="count">
                <h5 id="countdown-seconds">00</h5>
                <p>Segundos</p>
            </div>
        </div>
    </div>
    <div class="column-item">
        <a href="#" class="btn btn-info-outline">Reserva tu plaza</a>
    </div>

</div>
@endsection
@section('scripts')
<script>
    let collapsesHeads = document.getElementsByClassName("header-module");

    for (let i = 0; i < collapsesHeads.length; i++) {

        collapsesHeads[i].addEventListener("click", function() {
            
            let currentBodyCollapse = this.nextElementSibling;

            for (let elementCollapse of document.getElementsByClassName("collapse-module")){
                
                if(elementCollapse != currentBodyCollapse) elementCollapse.style.display = "none";
                
            }

            if (currentBodyCollapse.style.display === "block") {

                currentBodyCollapse.style.display = "none";

            } else {

                currentBodyCollapse.style.display = "block";

            }
        });
    }


    // Contador regresivo para el inicio del curso
    const courseStartDateStr = $('#course-initiation-date').data('coursestart');

    const courseStartDateTime = new Date(courseStartDateStr).getTime();

    // Update the count down every 1 second
    let countDown = setInterval(function() {

        // Get today's date and time
        let now = new Date().getTime();

        // Find the distance between now and the count down date
        let distance = courseStartDateTime - now;

        // Time calculations for days, hours, minutes and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        days = days < 10 ? '0' + days : days;

        hours = hours < 10 ? '0' + hours : hours;
        
        minutes = minutes < 10 ? '0' + minutes : minutes;
        
        seconds = seconds < 10 ? '0' + seconds : seconds;

        $('#countdown-day').text(days);
        $('#countdown-hours').text(hours);
        $('#countdown-minutes').text(minutes);
        $('#countdown-seconds').text(seconds);

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(countDown);
            $('#count-down-wrapper').css('display', 'none');
            console.log('Curso ya no está disponible');
        }

    }, 1000);

    
</script>
@endsection