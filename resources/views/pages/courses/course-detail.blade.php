@extends('layouts.front')
@section('title')
{{$course->name}}
@endsection
@section('content')
<div class="course-detail-wrapper">

    <div class="course-detail-content">
        <h2>INFORMACIÓN DEL CURSO</h2>

        <div class="course-detail" id="course-initiation-date" data-coursestart="{{$course->date_start}}">
            <div class="preview-video">
                <iframe width="100%" height="300"
                    src="https://www.youtube.com/embed/{{$course->video}}">
                </iframe>
            </div>
            <h3 class="title">{{$course->name}}</h3>
            <p class="description">{{$course->seo}}</p>

            <div class="all-body">
               {!! $course->info !!}
            </div>


            @if (!$course->is_free)
            
            <h5 class="features-title">MÓDULOS</h5>
            <div class="course-modules">
                @foreach ($course->modules as $module)
                <div class="module-item">
                    <div class="header-module">
                        <h4>{{$module->name}}</h4>
                        <span class="collapse-dow-icon fa fa-angle-down"></span>
                    </div>
                    <div class="collapse-module">
                        <div class="content">
                            <div class="info">
                                @if ($module->url_img)
                                <img src="{{asset('assets/uploads/'.$module->url_img)}}" alt="{{$module->name}}">
                                @else
                                    <p>{{$module->info}}</p>
                                @endif
                            </div>
                            <div class="duration-time">
                                @if ($module->url_img)
                                <p>{{$module->duration}} <span class="fa fa-play"></span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endforeach
                
            </div>
            
            <a class="general-action" href="{{route('frequent.questions')}}">Ver preguntas frecuentes</a>

            @else

            <br>
            <a class="btn btn-info-outline" style="font-family: Arca Majora" href="mailto:prueba@correo.com.pe">Enviar resultados al siguiente correo para certificarse: prueba@correo.com.pe</a>

            @endif

            
            

        </div>
        <div class="course-aside">
            @if (!$course->is_free)
                <div class="course-price">
                    <p class="amout">S/. {{number_format($course->prices[0]->amount, 2)}}</p>
                    {{-- <a href="#" class="btn btn-primary-outline">Comprar ahora</a> --}}
                    <button onclick="addCourseToCart(this)" data-course='{{json_encode($course)}}' class="btn btn-primary-outline">Agregar al carrito</button>

                </div>

            @endif

            <div class="course-content">
                <h5>Este curso incluye</h5>
                <ul>
                    @foreach ($course->features as $feature)
                        <li><i class="fa {{$feature->ft_icon}}"></i>{{$feature->info}}</li>
                        
                    @endforeach
                </ul>
            </div>
            <div class="preview-author">
                <h5>SOBRE EL AUTOR</h5>
                <div class="avatar">
                    <img src="{{asset('assets/uploads/'.$course->instructor->url_img)}}" alt="{{$course->instructor->name}}">
                </div>
                <div class="bio-preview">
                    <h6 class="fullname">{{$course->instructor->name}}</h6>
                    {{-- <p>{{$course->instructor->info}}</p> TODO: --}}
                    <a href="{{route('author', $course->instructor->slug)}}">Ver más</a>
                </div>
            </div>
        </div>

    </div>
</div>
@if (!$course->is_free)
<div class="count-down-wrapper" id="count-down-wrapper">
    <div class="column-item">
        {{-- <p>Quedan 12 plazas</p> TODO: --}}
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
        <a href="{{route('save.course', $course->slug)}}" class="btn btn-info-outline">Reserva tu plaza</a>
    </div>

</div>
    
@endif
@endsection
@section('scripts')
@if (!$course->is_free)
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
    
@endif
@endsection