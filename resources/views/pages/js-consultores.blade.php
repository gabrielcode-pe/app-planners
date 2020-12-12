@extends('layouts.front')
@section('title', 'JS Consultores')
@section('header-extra-class', 'with-bg')

@section('info-absolute-when-has-bg')
<div class="section-when-header-with-bg">
    <h1 class="title">Acerca de JS Consultores</h1>
    <p class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique, ipsam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, eaque.</p>
    <a href="#" class="btn btn-yellow">Testimonios</a>
</div>   
@endsection

@section('content')
<div class="js-consultores">
    <div class="bio-js">
        <div class="portrait">
            <img src="{{asset('assets/images/common-image.jpeg')}}" alt="">
        </div>
        <div class="text-bio">
            <h3>¿Quienes somos?</h3>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, molestiae praesentium eum dolorum temporibus iusto sapiente ullam deleniti inventore fuga dicta sunt excepturi beatae, debitis quam? Est dolores illum similique.</p>
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, molestiae praesentium eum dolorum temporibus iusto sapiente ullam deleniti inventore fuga dicta sunt excepturi beatae, debitis quam? Est dolores illum similique.</p>
        </div>
    </div>
    <div class="mision-vision">
        <div class="item">
            <div class="curtain-box">
                <img src="{{asset('assets/images/vision.png')}}" alt="">
                <p>Visión</p>
            </div>
            <h4>Visión</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus asperiores ratione, cupiditate culpa libero, maxime soluta architecto accusantium quisquam adipisci veniam quod natus minima? Veritatis accusantium fugiat rerum molestiae similique. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam ducimus deleniti placeat distinctio aspernatur ipsam possimus delectus magni ipsum voluptatum magnam, porro eius impedit nam repellendus tenetur alias quae aperiam!</p>
        </div>

        <div class="item">
            <div class="curtain-box bg-green">
                <img src="{{asset('assets/images/mision.png')}}" alt="">
                <p>Misión</p>
            </div>
            <h4>Misión</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus asperiores ratione, cupiditate culpa libero, maxime </p>
        </div>
    </div>

    {{-- <div class="clients-wrapper">
        <h2>Clientes JS Consultores</h2>
        <div class="clients-content">
            <div class="client-item">
                <img src="{{asset('assets/images/logo_client-test.png')}}" alt="">
            </div>

            <div class="client-item">
                <img src="{{asset('assets/images/logo_client-test.png')}}" alt="">
            </div>
            <div class="client-item">
                <img src="{{asset('assets/images/logo_client-test.png')}}" alt="">
            </div>
            <div class="client-item">
                <img src="{{asset('assets/images/logo_client-test.png')}}" alt="">
            </div>
            <div class="client-item">
                <img src="{{asset('assets/images/logo_client-test.png')}}" alt="">
            </div>

            <div class="client-item">
                <img src="{{asset('assets/images/logo_client-test.png')}}" alt="">
            </div>

            <div class="client-item">
                <img src="{{asset('assets/images/logo_client-test.png')}}" alt="">
            </div>
            <div class="client-item">
                <img src="{{asset('assets/images/logo_client-test.png')}}" alt="">
            </div>
            <div class="client-item">
                <img src="{{asset('assets/images/logo_client-test.png')}}" alt="">
            </div>
            <div class="client-item">
                <img src="{{asset('assets/images/logo_client-test.png')}}" alt="">
            </div>
        </div>
    </div> --}}

    <div class="valores-wrapper">
        <div class="item-valor">

        </div>
    </div>

    <div class="consults-wrapper">
        <h2>Consultorías</h2>
        <div class="consults-content">
            @foreach ($consultants as $consult)
                <div class="consult-item">
                    <h4 class="title">Consultoría {{$consult->nro_order}}</h4>
                    <p class="info">{{$consult->info}}</p>
                    <p class="customer">{{$consult->customer}}</p>
                    <p class="date-consult"><small>{{$consult->fechas}}</small></p>
                </div>
            @endforeach
            
        </div>
    </div>

    <div class="js-form-wrapper">

    </div>
</div>
@endsection

@section('scripts')
{{-- <script type="text/javascript" src="{{asset('assets/slick-carousel/slick.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('.clients-content').slick({
                dots: true,
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 5,
            });
        });
    </script> --}}
@endsection