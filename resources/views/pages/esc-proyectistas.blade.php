@extends('layouts.front')
@section('title', 'Acerca de nosotros')
@section('content')
<div class="js-consultores">
    <div class="bio-js">
        <div class="portrait">
            <img src="{{asset('assets/images/bg-e-learning.jpeg')}}" alt="">
        </div>
        <div class="text-bio">
            <h3>La escuela de proyectistas</h3>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, molestiae praesentium eum dolorum temporibus iusto sapiente ullam deleniti inventore fuga dicta sunt excepturi beatae, debitis quam? Est dolores illum similique.</p>
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, molestiae praesentium eum dolorum temporibus iusto sapiente ullam deleniti inventore fuga dicta sunt excepturi beatae, debitis quam? Est dolores illum similique.</p>
            
            <div class="action">

                <a href="#" class="btn btn-orange">¿Te ayudamos?</a>
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
</div>
@endsection