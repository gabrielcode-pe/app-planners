@extends('layouts.app')
@section('titulo') Registrar curso @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar curso</h5>
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
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Ingrese el nombre del curso" required>
            <small id="name" class="form-text text-muted">Max. 200 caracteres.</small>
        </div>
    </section>

    <section class="col-12">
        <div class="form-group">
            <textarea name="summary" id="summary" rows="2" class="form-control" placeholder="Ingrese resumen del texto" required></textarea>
            <small id="summary" class="form-text text-muted">Max. 120 caracteres.</small>
        </div>
    </section>

    <section class="col-12 col-md-4">
        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" id="status" class="form-control">
                <option value="0">Inactivo</option>
                <option value="1">Activo</option>
            </select>
        </div>
    </section>
    <section class="col-12 col-md-4">
        <div class="form-group">
            <label for="category">Categoría</label>
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"> {{$category->name}} </option>
                @endforeach
            </select>
        </div>
    </section>
    <section class="col-12 col-md-4">
        <div class="form-group">
            <label for="date_start">Fecha de Inicio</label>
            <input type="date" step="1" class="form-control">
        </div>
    </section>

    <section class="col-12 col-md-8">
        <div class="form-group">
            <textarea name="summary" id="summary" rows="4" class="form-control ckeditor" placeholder="Ingrese aqui la información del curso a detalle"></textarea>
        </div>
    </section>
    <section class="col-12 col-md-4">
        <div class="form-group">
            <input type="file" class="form-control-file" name="imagen" id="imagen" required>
            <small id="imagen" class="form-text text-muted">Max. 150Kb | Dimen. 1024 x 700 px</small>
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection