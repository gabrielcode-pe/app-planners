@extends('layouts.app')
@section('titulo') Actualizar usuario {{$user->name}} @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar usuario</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/user')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/user/'.$user->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT')}}
    <div class="row">    
    <section class="col-12 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" aria-describedby="name" value="{{$user->name}}">
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
            @if($user->role!='ADMIN')
                <option value="ADMIN">Administrador</option>
                <option value="SUPPORT" selected>Soporte</option>
            @else
                <option value="ADMIN" selected>Administrador</option>
                <option value="SUPPORT">Soporte</option>
            @endif                
            </select>
        </div>
    </section>

    <section class="col-12 col-md-6">
        <div class="form-group">
            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" aria-describedby="email" value="{{$user->email}}">
            @if ($errors->has('email'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12 col-md-6">
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="Ingrese contraseña" value="{{$user->password}}" readonly>

            <small id="pass2" class="form-text text-muted">8 caracteres min. | alfanuméricos</small>
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection