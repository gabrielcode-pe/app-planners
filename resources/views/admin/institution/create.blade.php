@extends('layouts.app')
@section('titulo') Registrar cliente @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar Cliente</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/institution')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/institution') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">    
    <section class="col-12 col-md-3">
    <div class="form-group">
            <input type="file" class="form-control-file {{ $errors->has('url_portrait') ? ' is-invalid' : '' }}" name="url_portrait" id="url_portrait" required>
            @if ($errors->has('url_portrait'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('url_portrait') }}
            </div>
            @endif
            <small id="url_portrait" class="form-text text-muted">Max. 150Kb | Dimen. 700 x 700 px</small>
        </div>        
    </section>

    <section class="col-12 col-md-8">
    <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" aria-describedby="name" placeholder="Nombre|Razón Social del Cliente" required>
            @if ($errors->has('name'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            @endif
            <small id="name" class="form-text text-muted">Max. 255 caracteres.</small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('url_web') ? ' is-invalid' : '' }}" id="url_web" name="url_web" placeholder="URL de la web del cliente" required>
            @if ($errors->has('url_web'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('url_web') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection