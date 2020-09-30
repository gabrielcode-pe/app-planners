@extends('layouts.front')
@section('title', 'Inicio')


@section('header-extra-class', 'with-bg')

@section('info-absolute-when-has-bg')
<div class="section-when-header-with-bg">
    <h1 class="title">Sistema educativo premium</h1>
    <p class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique, ipsam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, eaque.</p>
    <a href="#" class="btn btn-yellow">Descubre nuestros cursos</a>
</div>   
@endsection

@section('content')
<h2 class="slider-title">Cursos gratuitos</h2>
<div class="slider-courses">
    <div class="course-item">
        <h4 class="title">Contratos en la actualidad</h4>
        <a href="#">
            <img src="{{asset('assets/images/course-image2.jpeg')}}" alt="">
        </a>
    </div>

    <div class="course-item">
        <h4 class="title">Contratos en la actualidad</h4>
        <a href="#">
            <img src="{{asset('assets/images/course-image2.jpeg')}}" alt="">
        </a>
    </div>

    <div class="course-item">
        <h4 class="title">Contratos en la actualidad</h4>
        <a href="#">
            <img src="{{asset('assets/images/course-image2.jpeg')}}" alt="">
        </a>
    </div>

    <div class="course-item">
        <h4 class="title">Contratos en la actualidad</h4>
        <a href="#">
            <img src="{{asset('assets/images/course-image2.jpeg')}}" alt="">
        </a>
    </div>
</div>

<div class="slider-action">
    <a href="#" class="btn btn-info-outline">Ver todos nuestros cursos gratis</a>
</div>

<h2 class="slider-title">Testimonios</h2>

<div class="testimonies-whraper">
    <div class="testimonies slider-testimonies">
        <div class="testimonie-item">
            <div class="portrait">
                <img src="{{asset('assets/images/author1.jpg')}}" alt="">
            </div>
            <div class="info">
                <p class="author-name">Jorge Zaen G.</p>
                <p class="author-speciality">Director de activos</p>

                <p class="write-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam autem quaerat quo perferendis vero facilis in, iure at ut aliquid non dolorem cum fugiat! Dolorum ipsum autem suscipit praesentium dicta non quae cum perspiciatis quos. Totam molestiae ipsum soluta quibusdam repellat sint velit, doloremque animi temporibus quod, laborum non quis odit ea et nobis aperiam maxime iste, fuga harum voluptatum magni dolore! Veniam accusamus modi eum ipsa fugiat nulla inventore?</p>
            </div>
        </div>

        <div class="testimonie-item yellow">
            <div class="portrait">
                <img src="{{asset('assets/images/author1.jpg')}}" alt="">
            </div>
            <div class="info">
                <p class="author-name">Jorge Zaen G.</p>
                <p class="author-speciality">Director de activos</p>

                <p class="write-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus ullam quaerat recusandae numquam dolorem soluta culpa enim ad minus. Iste, explicabo animi minus quaerat suscipit inventore magni exercitationem neque doloremque!</p>
            </div>
        </div>


        <div class="testimonie-item">
            <div class="portrait">
                <img src="{{asset('assets/images/author1.jpg')}}" alt="">
            </div>
            <div class="info">
                <p class="author-name">Jorge Zaen G.</p>
                <p class="author-speciality">Director de activos</p>

                <p class="write-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus ullam quaerat recusandae numquam dolorem soluta culpa enim ad minus. Iste, explicabo animi minus quaerat suscipit inventore magni exercitationem neque doloremque!</p>
            </div>
        </div>

        <div class="testimonie-item yellow">
            <div class="portrait">
                <img src="{{asset('assets/images/author1.jpg')}}" alt="">
            </div>
            <div class="info">
                <p class="author-name">Jorge Zaen G.</p>
                <p class="author-speciality">Director de activos</p>

                <p class="write-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus ullam quaerat recusandae numquam dolorem soluta culpa enim ad minus. Iste, explicabo animi minus quaerat suscipit inventore magni exercitationem neque doloremque!</p>
            </div>
        </div>
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