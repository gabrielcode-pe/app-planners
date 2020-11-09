@extends('layouts.front')
@section('title', 'Reservar plaza')
@section('content')
<div class="contact-wrapper">
    <div class="contact-content">
        <div class="portrait">
            <h3>{{$course->name}}</h3><br>
            <img src="{{asset('assets/uploads/'.$course->url_portrait)}}" alt="{{$course->name}}">
        </div>
        <div class="form-wrapper">
            <h2 class="title">Reservar plaza</h2>
            @if (session('message'))
                <p class="success-message">{{session('message')}}</p>
            @endif
            <form action="{{route('save.course.post')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$course->name}}" name="course_name">
                <div class="form-group">
                    <input type="text" class="input-custom" name="name" placeholder="Nombres y apellidos">
                </div>

                <div class="form-group">
                    <input type="text" class="input-custom" name="company" placeholder="Empresa o Negocio">
                </div>

                <div class="form-group">
                    <input type="email" class="input-custom" name="email" placeholder="Correo electrónico">
                </div>

                <div class="form-group">
                    <input type="number" class="input-custom" name="phone" placeholder="Teléfono">
                </div>

                <div class="form-group">
                    <textarea name="message" class="input-custom" rows="3" placeholder="Escribe un mensaje"></textarea>
                </div>

                <div class="form-group center">
                    <button type="submit" class="btn btn-yellow">Reservar</button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection