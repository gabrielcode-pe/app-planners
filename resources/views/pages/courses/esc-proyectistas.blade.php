@extends('layouts.front')
@section('title', 'Nuestros cursos')
@section('content')
<div class="categories">
    <h4 class="title">Todos los cursos</h4>
    <ul>
        <li><a  class="{{!$isFree ? 'active' : ''}}" href="{{url('/cursos?mod=premium')}}">Cursos premium</a></li>
        <li><a  class="{{$isFree ? 'active' : ''}}" href="{{url('/cursos?mod=gratuito')}}">Cursos gratuitos</a></li>
    </ul>
</div>
<div class="courses-wrapper">
    <h4 class="title">Cursos {{$isFree ? 'gratuitos' : 'premium'}}</h4>
    <div class="courses-list">
        @foreach ($courses as $course)
            <div class="course-item">
                <div class="portrait">
                    <img src="{{asset('assets/uploads/'.$course->url_portrait)}}" alt="{{$course->name}}">
                    @if(!$course->is_free)
                        <div class="price"><p>S/. {{number_format($course->prices[0]->amount, 2)}}</p></div>
                    @endif
                </div>
                <div class="detail">
                    <h5 class="title">{{$course->name}}</h5>
                    <p class="description">{{$course->seo}}</p>
                    <p class="author">{{$course->instructor->name}}</p>
                    <div class="actions">
                        @if(!$course->is_free)
                            <button onclick="addCourseToCart(this)" data-course='{{json_encode($course)}}' class="btn btn-primary-outline"><i class="fa fa-shopping-cart"></i></button>
                        @endif
                        <a href="{{route('course.detail', $course->slug)}}" class="btn btn-primary-outline">Detalles del curso</a>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
</div>
@endsection