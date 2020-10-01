@extends('layouts.app')
@section('titulo') Registrar nueva categoría @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar categoría</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form>
    {{ csrf_field() }}
    <div class="row">    
    <section class="col-12">
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Ingrese la nueva categoría" required>
            <small id="name" class="form-text text-muted">Max. 255 caracteres.</small>
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection