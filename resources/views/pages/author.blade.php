@extends('layouts.front')
@section('title')
{{$instructor->name}}
@endsection
@section('content')
<div class="author-wrapper">
    <div class="author-bio">
        <h4 class="title">Sobre: {{$instructor->name}}</h4>

        <p>{{$instructor->description}}</p>
        <div>
            {!! $instructor->info !!}
        </div>
    </div>
    <div class="author-portrait">
        <img src="{{asset('assets/uploads/'. $instructor->url_img)}}" alt="{{$instructor->name}}">
    </div>
</div>
@endsection