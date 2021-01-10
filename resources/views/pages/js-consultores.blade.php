@extends('layouts.front')
@section('title', 'JS Consultores')
@section('header-extra-class', 'with-bg')

@section('info-absolute-when-has-bg')
<div class="section-when-header-with-bg">
    <h1 class="title jsc">Acerca de JS Consultores</h1>
    <p class="description">Brindamos servicios de elaboración y evaluación de proyectos de inversión pública a nivel de perfil, factibilidad y Expediente Técnico, Obras por impuestos, instrumentos Metodológicos y capacitaciones, todos enfocados en el marco del Invierte.pe.</p>
    {{-- <p class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique, ipsam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, eaque.</p> --}}
    <a href="{{route('testimonies')}}" class="btn btn-yellow">Testimonios</a>
</div>   
@endsection

@section('content')
<div class="js-consultores">
    <div class="bio-js">
        <div class="portrait">
            <img src="{{asset('assets/images/js.jpg')}}" alt="">
        </div>
        <div class="text-bio">
            <h3>¿Quienes somos?</h3>

           <p>Somos una empresa comprometida a brindar servicios de asesoría y consultoría en Formulación de Proyectos y Gestión Pública y Privada de alta calidad, así como a satisfacer los requerimientos de nuestros clientes, por medio de una atención personalizada y exclusiva.</p>
           <p>Además, ofrecemos servicios de elaboración de planes de negocio, estudios de mercado, diagnósticos y estudios especializados; así como, capacitaciones en administración, marketing, finanzas, entre otros.</p>
           <p>El crecimiento constante de nuestra empresa es gracias a una sólida estructura conformada por nuestro equipo multidisciplinario de colaboradores altamente calificados.</p>

            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, molestiae praesentium eum dolorum temporibus iusto sapiente ullam deleniti inventore fuga dicta sunt excepturi beatae, debitis quam? Est dolores illum similique.</p>
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, molestiae praesentium eum dolorum temporibus iusto sapiente ullam deleniti inventore fuga dicta sunt excepturi beatae, debitis quam? Est dolores illum similique.</p> --}}
        </div>
    </div>
    <div class="mision-vision">
        <div class="item">
            <div class="curtain-box">
                <img src="{{asset('assets/images/vision.png')}}" alt="">
                <p>Visión</p>
            </div>
            <h4>Visión</h4>
            <p>Para el 2025, ser reconocidos en el país como una consultora líder en el mercado, destacando por la calidad en nuestros servicios y la perfecta relación entre nuestros clientes con los consultores asociados, formuladores asociados, aliados estratégicos y colaboradores.</p>
        </div>

        <div class="item">
            <div class="curtain-box bg-green">
                <img src="{{asset('assets/images/mision.png')}}" alt="">
                <p>Misión</p>
            </div>
            <h4>Misión</h4>
            <p>Brindar servicios de asesoría y consultoría en elaboración y evaluación de proyectos de inversión pública a nivel de perfil, factibilidad y Expediente Técnico de naturaleza ambiental, turística y cultural, proyectos para obras por impuestos y capacitaciones en el marco del Invierte.pe; asimismo, servicios de gestión empresarial y estudios especializados; promoviendo un comportamiento socialmente responsable y velando porque el compromiso y los objetivos de la empresa se desarrollen de forma ética.</p>
        </div>
    </div>

    <div class="clients-wrapper">
        <h2>Clientes JS Consultores</h2>
        <div class="clients-content">
            @foreach ($clients as $client)
                <div class="client-item">
                    <img src="{{asset('assets/uploads/'.$client->url_logo)}}" alt="{{$client->name}}">
                </div>
                
            @endforeach
        </div>
    </div>

    <div class="valores-wrapper">
        <h2>Nuestros valores</h2>
        <div class="valores-content">
            <div class="valor-item">
                <div class="curtain-box">
                    <img src="{{asset('assets/images/valores-calidad.jpg')}}" alt="">
                </div>
                <h4>Calidad</h4>
                <p>Con los servicios ofrecidos.</p>
            </div>
            <div class="valor-item">
                <div class="curtain-box">
                    <img src="{{asset('assets/images/valores-puntualidad.jpg')}}" alt="">
                </div>
                <h4>Puntualidad</h4>
                <p>Cumplir con los compromisos y obligaciones en el tiempo acordado.</p>
            </div>
            <div class="valor-item">
                <div class="curtain-box">
                    <img src="{{asset('assets/images/valores-responsabilidad.jpg')}}" alt="">
                </div>
                <h4>Responsabilidad</h4>
                <p>Con los trabajadores, comprometidos con la estabilidad y buenas condiciones laborales; con los clientes, comprometidos a entregar servicios de calidad; y con el medio ambiente comprometidos con la sostenibilidad.</p>
            </div>
            <div class="valor-item">
                <div class="curtain-box">
                    <img src="{{asset('assets/images/valores-honestidad.jpg')}}" alt="">
                </div>
                <h4>Honestidad</h4>
                <p>Desarrollar nuestras actividades con transparencia cumpliendo con las responsabilidades asignadas en el uso de la información y la ética.</p>
            </div>
            <div class="valor-item">
                <div class="curtain-box">
                    <img src="{{asset('assets/images/valores-compromiso.jpeg')}}" alt="">
                </div>
                <h4>Compromiso</h4>
                <p>Con el cumplimiento de la legislación aplicable y los principios, políticas y estándares de JS Consultores Empresariales S.A.C.</p>
            </div>
            <div class="valor-item">
                <div class="curtain-box">
                    <img src="{{asset('assets/images/valores-solidaridad.jpeg')}}" alt="">
                </div>
                <h4>Solidaridad</h4>
                <p>En el clima de amistad, trabajando en conjunto para lograr nuestra misión y encaminarnos hacia el logro de nuestra visión.</p>
            </div>
        </div>
    </div>

    

    <div class="js-form-wrapper">

    </div>
</div>
<div class="courses-medida-wrapper">
    <div class="courses-medida-content">
        <h3 class="text-center">Nuestros servicios</h3>

        <div class="list">

            @foreach ($services as $service)
                <div class="course-medida-item">
                    <div class="portrait">
                        <img src="{{asset('assets/uploads/'.$service->url_img)}}" alt="{{$service->title}}">
                    </div>
                    <div class="info">
                        <h4 class="title">{{$service->title}}</h4>
                        <div class="body-text">
                            {!! $service->info !!}
                        </div>
                    </div>
                </div>
                
            @endforeach

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('assets/slick-carousel/slick.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('.clients-content').slick({
                dots: true,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
            });
        });
    </script>
@endsection