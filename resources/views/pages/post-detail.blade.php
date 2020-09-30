@extends('layouts.front')
@section('title')
    Título del post
@endsection
@section('content')
<div class="post-detail-wrapper">
    <div class="post-detail">
        <h2>5 cosas que debes saber de los negocios</h2>

        <div class="portrait">
            <img src="{{asset('assets/images/post-image2.jpeg')}}" alt="">
        </div>
        <p class="post-date">20/09/2020</p>

        <p class="summary">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto incidunt repudiandae aperiam! Beatae repellendus natus officiis provident dicta nostrum cumque?</p>
        <div class="content-text">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, doloremque, eaque magnam praesentium enim nulla cupiditate, a at sequi tenetur consectetur earum. Vel numquam quae, nisi tempore quaerat mollitia dolore!</p>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, doloremque, eaque magnam praesentium enim nulla cupiditate, a at sequi tenetur consectetur earum. Vel numquam quae, nisi tempore quaerat mollitia dolore!</p>
        </div>

        
    </div>
</div>
@endsection