@extends('layouts.front')
@section('title', 'Contacte con nosotros')
@section('content')
<div class="contact-wrapper">
    <div class="contact-content">
        <div class="portrait">
            <img src="{{asset('assets/images/common-image.jpeg')}}" alt="">
        </div>
        <div class="form-wrapper">
            <h2 class="title">Contacte con nosotros</h2>
            @if (session('message'))
                <p class="success-message">{{session('message')}}</p>
            @endif
            <form action="{{route('contact.store')}}" method="POST">
                @csrf
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
                    <button type="submit" class="btn btn-yellow">Enviar</button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection