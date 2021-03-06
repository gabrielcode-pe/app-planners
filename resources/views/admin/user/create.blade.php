@extends('layouts.app')
@section('titulo') Registrar nuevo usuario @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar usuario</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/user')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/user') }}" method="post">
    {{ csrf_field() }}
    <div class="row">    
    <section class="col-12 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" aria-describedby="name" placeholder="Nombres completos" value="{{old('name')}}" required>
            @if ($errors->has('name'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            @endif
            <small id="name" class="form-text text-muted">Max. 255 caracteres.</small>
        </div>
    </section>

    <section class="col-12 col-md-6">
        <div class="form-group">
            <select name="role" id="role" class="form-control">
                <option value="ADMIN">Administrador</option>
                <option value="SUPPORT">Soporte</option>
            </select>
        </div>
    </section>

    <section class="col-12 col-md-6">
        <div class="form-group">
            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" aria-describedby="email" placeholder="Ingrese correo electrónico" value="{{old('email')}}" required>
            @if ($errors->has('email'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12 col-md-6">
        <div class="form-group">
            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" aria-describedby="password" placeholder="Ingrese contraseña" required>
            @if ($errors->has('password'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('password') }}
            </div>
            @endif
            <small id="pass2" class="form-text text-muted">8 caracteres min. | alfanuméricos</small>
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection