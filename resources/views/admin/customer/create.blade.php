@extends('layouts.app')
@section('titulo') Registrar cliente @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar Cliente</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
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
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Nombre|Razón Social del Cliente" required>
            <small id="name" class="form-text text-muted">Max. 255 caracteres.</small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="urlweb" name="urlweb" placeholder="URL de la web del cliente" required>
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection