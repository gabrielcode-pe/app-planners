@extends('layouts.front')
@section('title')
Nombre del autor
@endsection
@section('content')
<div class="author-wrapper">
    <div class="author-bio">
        <h4 class="title">Sobre el autor</h4>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea assumenda delectus tempore fuga obcaecati, qui nihil rem dicta quam quidem, possimus veniam quod ex amet non! Enim tempora laborum eos!</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea assumenda delectus tempore fuga obcaecati, qui nihil rem dicta quam quidem, possimus veniam quod ex amet non! Enim tempora laborum eos!</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea assumenda delectus tempore fuga obcaecati, qui nihil rem dicta quam quidem, possimus veniam quod ex amet non! Enim tempora laborum eos!</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea assumenda delectus tempore fuga obcaecati, qui nihil rem dicta quam quidem, possimus veniam quod ex amet non! Enim tempora laborum eos!</p>
    </div>
    <div class="author-portrait">
        <img src="{{asset('assets/images/author1.jpg')}}" alt="">
    </div>
</div>
@endsection