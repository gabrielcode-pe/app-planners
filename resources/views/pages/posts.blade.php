@extends('layouts.front')
@section('title', 'Nuestros posts')
@section('content')
<div class="posts">
    @foreach ($posts as $post)
        <div class="post-item">
            <h2 class="title">{{$post->title}}</h2>
            <div class="post-body">
                <div class="portrait">
                    <img src="{{asset('assets/uploads/'.$post->url_portrait)}}" alt="{{$post->title}}">
                </div>
                <div class="info">
                    <p class="post-date">{{date('d/m/Y', strtotime($post->created_at))}}</p>
                    <p class="sumary">{{$post->summary}}</p>
                    <a href="{{route('post.detail', $post->slug)}}" class="btn btn-primary">Seguir leyendo</a>
                </div>
            </div>
        </div>
        
    @endforeach
</div>
@endsection