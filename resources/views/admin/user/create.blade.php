@extends('layouts.app')
@section('titulo') Registrar nuevo usuario @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar usuario</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form>
    {{ csrf_field() }}
    <div class="row">    
    <section class="col-12 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Nombres completos" required>
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
            <input type="password" class="form-control" id="pass1" name="pass1" aria-describedby="pass1" placeholder="Ingrese contraseña" required>
            <small id="pass1" class="form-text text-muted">8 caracteres min. | alfanuméricos</small>
        </div>
    </section>

    <section class="col-12 col-md-6">
        <div class="form-group">
            <input type="password" class="form-control" id="pass2" name="pass2" aria-describedby="pass2" placeholder="Vuelva a ingresar contraseña" required>
            <small id="pass2" class="form-text text-muted">8 caracteres min. | alfanuméricos</small>
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection