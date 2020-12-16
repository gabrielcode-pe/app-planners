@extends('layouts.front')
@section('title', 'Acerca de nosotros')
@section('content')
<div class="js-consultores">
    <div class="bio-js">
        <div class="portrait">
            <img src="{{asset('assets/images/escuela.jpg')}}" alt="">
        </div>
        <div class="text-bio">
            <h3>La escuela de proyectistas</h3>

            <p>Somos una escuela especializada en los temas de inversión pública y privada en el Perú, contamos con distintos medios de canales como Facebook / Youtube / Instagram.</p>
            <p>¿Quieres realizar proyectos tanto en gestión pública, medio ambiente, turismo, entre otros?</p>
            <p>¡Quédate atento a nuestro contenido en redes, siempre tenemos sorpresas para ti!</p>
            <p>Si desean una consultoría o un curso completo no duden en contactarse.</p>

            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, molestiae praesentium eum dolorum temporibus iusto sapiente ullam deleniti inventore fuga dicta sunt excepturi beatae, debitis quam? Est dolores illum similique.</p>
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, molestiae praesentium eum dolorum temporibus iusto sapiente ullam deleniti inventore fuga dicta sunt excepturi beatae, debitis quam? Est dolores illum similique.</p> --}}
            
            <div class="action">

                <a href="{{url('contacto')}}" class="btn btn-orange">¿Te ayudamos?</a>
            </div>
        </div>
    </div>
    <div class="mision-vision">
        <div class="item">
            <div class="curtain-box">
                <img src="{{asset('assets/images/vision.png')}}" alt="">
                <p>Visión</p>
            </div>
            <h4>Visión</h4>
            <p>Para el 2025, la Escuela de Proyectistas será reconocida como la mejor Escuela de Posgrado en el ámbito de Proyectos de Inversión Pública y Privada gracias a la calidad de sus servicios y la excelencia de su plana docente, promoviendo el desarrollo del país a través de la formación de capital humano que lidere y participe en las principales decisiones de inversión en el país.</p>
        </div>

        <div class="item">
            <div class="curtain-box bg-green">
                <img src="{{asset('assets/images/mision.png')}}" alt="">
                <p>Misión</p>
            </div>
            <h4>Misión</h4>
            <p>La Escuela de Proyectistas tiene por finalidad brindar capacidades y conocimientos sobre elaboración de proyectos de inversión pública, privada e Inversiones de Optimización, Ampliación Marginal Rehabilitación y Reposición en el ciclo de inversiones, en el marco del <b>Invierte.pe</b>; promoviendo el crecimiento profesional y laboral de nuestros estudiantes y el comportamiento socialmente responsable a través de proyectistas que desarrollen inversiones generadores de bienestar y desarrollo sostenible del país. </p>
        </div>
    </div>
</div>
@endsection