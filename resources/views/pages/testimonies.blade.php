@extends('layouts.front')
@section('title', 'Testimonios')
@section('content')
<div class="testimonies-whraper">
    <div class="testimonies">
        <h2>TESTIMONIOS</h2>
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