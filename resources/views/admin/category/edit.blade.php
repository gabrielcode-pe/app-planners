@extends('layouts.app')
@section('titulo') Editar categoría {{$categoria->name}} @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Actualizar categoría</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/category')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

<form action="" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="row">    
<section class="col-12 col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Ingrese la nueva categoría" value="{{ $categoria->name }}" required>
        <small id="name" class="form-text text-muted">Max. 255 caracteres.</small>
    </div>
</section>

<section class="col-12 col-md-6">
    <div class="form-group">
        <label for="url_portrait"> {{$categoria->url_portrait}} </label>
        <input type="file" class="form-control-file" name="url_portrait" id="url_portrait" required>
        <small id="imagen" class="form-text text-muted">Max. 150Kb | Dimen. 1024 x 700 px</small>
    </div>
</section>

<section class="col-12 text-center">
    <button type="submit" class="btn btn-primary">Actualizar</button>
</section>
</div>
</form>

@endsection