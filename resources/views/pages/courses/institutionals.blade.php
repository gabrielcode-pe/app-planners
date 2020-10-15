@extends('layouts.front')
@section('title', 'Cursos institucionales')
@section('content')
<div class="categories bg-green">
    <h4 class="title">Instituciones</h4>
    <ul>
        @foreach ($institutions as $insti)

            <li><a href="{{url('/cursos-institucionales?institucion='.$insti->slug)}}" class="{{$institucionSlug == $insti->slug ? 'active' : ''}}" >{{$insti->name}}</a></li>

        @endforeach
    </ul>
</div>
<div class="courses-wrapper">
    <h4 class="title">Cursos Institucionales</h4>
    <div class="courses-list">
        @foreach ($courses as $course)
            <div class="course-item">
                <div class="portrait">
                    <img src="{{asset('assets/uploads/'.$course->url_portrait)}}" alt="course item">
                    @if(!$course->is_free)
                        <div class="price">
                            <p>S/. {{number_format($course->prices[0]->amount, 2)}}</p>
                        </div>
                    @endif
                </div>
                <div class="detail">
                    <h5 class="title">{{$course->name}}</h5>
                    <p class="description">{{$course->seo}}</p>
                    <p class="author">{{$course->instructor->name}}</p>
                    <div class="actions">
                        <button onclick="addCourseToCart(this)" data-course='{{json_encode($course)}}' class="btn btn-primary-outline"><i class="fa fa-shopping-cart"></i></button>
                        <a href="{{route('course.detail', $course->slug)}}" class="btn btn-primary-outline">Detalles del curso</a>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
</div>
@endsection