@extends('layouts.front')
@section('title', 'Cursos a la medida')
@section('content')

<div class="courses-medida-wrapper">
    <div class="courses-medida-content">
        <h3>CURSOS A LA MEDIDA</h3>

        <div class="list">

            @foreach ($courses as $course)
                <div class="course-medida-item">
                    <div class="portrait">
                        <img src="{{asset('assets/uploads/'.$course->url_img)}}" alt="{{$course->title}}">
                    </div>
                    <div class="info">
                        <h4 class="title">{{$course->title}}</h4>
                        <div class="body-text">
                            {!! $course->info !!}
                        </div>
                    </div>
                </div>
                
            @endforeach

        </div>
    </div>
</div>
@endsection