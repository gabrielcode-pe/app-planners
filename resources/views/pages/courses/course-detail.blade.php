@extends('layouts.front')
@section('title')
Titulo del curso
@endsection
@section('content')
<div class="course-detail-wrapper">

    <div class="course-detail-content">
        <h2>INFORMACIÓN DEL CURSO</h2>

        <div class="course-detail">
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
@endsection