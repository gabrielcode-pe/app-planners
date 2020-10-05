@extends('layouts.front')
@section('title')
{{$post->title}}
@endsection
@section('content')
<div class="post-detail-wrapper">
    <div class="post-detail">
        <h2>{{$post->title}}</h2>

        <div class="portrait">
            <img src="{{asset('assets/uploads/'.$post->url_portrait)}}" alt="{{$post->title}}">
        </div>
        <p class="post-date">{{date('d/m/Y', strtotime($post->created_at))}}</p>

        <p class="summary">{{$post->summary}}</p>
        <div class="content-text">
            <p>{!! $post->body !!}</p>
        </div>

        
    </div>
</div>
@endsection