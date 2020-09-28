@extends('layouts.app')
@section('titulo') Registrar docente @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar Docente</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-outline-secondary btn-sm"> <i class="fas fa-angle-left"></i> Volver </a>
    </section>
</div>

    <form>
    {{ csrf_field() }}
    <div class="row">    
    <section class="col-12 col-md-3">
    <div class="form-group">
            <input type="file" class="form-control-file" name="imagen" id="imagen" required>
            <small id="imagen" class="form-text text-muted">Max. 150Kb | Dimen. 700 x 700 px</small>
        </div>        
    </section>

    <section class="col-12 col-md-8">
    <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Nombre completo del docente" required>
            <small id="name" class="form-text text-muted">Max. 255 caracteres.</small>
        </div>
        <div class="form-group">
            <textarea name="summary" id="summary" rows="3" class="form-control" placeholder="Ingrese resumen del Docente" required></textarea>
            <small id="summary" class="form-text text-muted">Max. 255 caracteres.</small>
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection