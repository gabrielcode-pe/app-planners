@extends('layouts.app')
@section('titulo') Registrar imagen @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar imagen</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form>
    {{ csrf_field() }}
    <div class="row">
        <section class="col-12 col-md-4">
            <div class="form-group">
                <input type="file" class="form-control-file" name="imagen" id="imagen" required>
                <small id="imagen" class="form-text text-muted">Max. 150Kb | Dimen. 1024 x 700 px</small>
            </div>
        </section>       
    
        <section class="col-12 col-md-8">
            <div class="form-group">
                <textarea name="tag" id="tag" rows="3" class="form-control" placeholder="Ingrese resumen del texto" required></textarea>
            </div>
        </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection