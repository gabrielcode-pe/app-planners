@extends('layouts.front')
@section('title', 'Inicio')


@section('header-extra-class', 'with-bg')

@section('info-absolute-when-has-bg')
<div class="section-when-header-with-bg">
    <h1 class="title">Capacítate con nosotros</h1>
    <p class="description">
        Brindamos una educación de PRIMER NIVEL que te permitirá ser un especialista competitivo en proyectos de inversión pública y privada.</p>
    <a href="{{url('cursos?mod=premium')}}" class="btn btn-yellow">Descubre nuestros cursos</a>
</div>   
@endsection

@section('content')
<h2 class="slider-title">Nuestros cursos</h2>
<div class="slider-courses">
    @foreach ($courses as $course)
        <div class="course-item">
            <h4 class="title">{{$course->name}}</h4>
            <a href="{{route('course.detail', $course->slug)}}">
                <img src="{{asset('assets/uploads/'.$course->url_portrait)}}" alt="{{$course->name}}">
            </a>
        </div>
    @endforeach
</div>

<div class="slider-action">
    <a href="{{url('/cursos?mod=premium')}}" class="btn btn-info-outline">Ver todos nuestros cursos</a>
</div>

<h2 class="slider-title">Testimonios</h2>

<div class="testimonies-whraper">
    <div class="testimonies slider-testimonies">
        @foreach ($testimonies as $index => $testimony)
            <div class="testimonie-item {{$index % 2 != 0 ? 'yellow' : ''}}">
                <div class="portrait">
                    <img src="{{asset('assets/uploads/'.$testimony->url_img)}}" alt="{{$testimony->name}}">
                </div>
                <div class="info">
                    <p class="author-name">{{$testimony->name}}</p>
                    <p class="author-speciality">{{$testimony->jobtitle}}</p>

                    <p class="write-text">{{$testimony->description}}</p>
                </div>
            </div>
            
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('assets/slick-carousel/slick.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider-courses').slick({
                dots: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
            });
        });


        $('.slider-testimonies').slick({
            dots: true,
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2,
        });
    </script>
@endsection