@extends('layouts.app')
@section('titulo') Registrar nueva medida @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar medida</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/medida')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/medida')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="type" value="M">
    <div class="row">
    <section class="col-12 col-md-10">
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" aria-describedby="title" placeholder="Ingrese el título de la medida" value="{{old('title')}}" required>
            @if ($errors->has('title'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
            @endif
            <small id="title" class="form-text text-muted">Max. 250 caracteres.</small>
        </div>
    </section>

    <section class="col-12 col-md-2">
        <div class="form-group">
            <input type="number" class="form-control {{ $errors->has('nro_order') ? ' is-invalid' : '' }}" id="nro_order" name="nro_order" aria-describedby="nro_order" placeholder="Orden. Ej: 1" value="{{old('nro_order')}}" required>
            @if ($errors->has('nro_order'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('nro_order') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12 col-md-8">
        <div class="form-group">
            <textarea name="info" id="info" class="form-control ckeditor" rows="5" placeholder="Ingrese la información de la medida">{{old('info')}}</textarea>
            
            @if ($errors->has('info'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('info') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12 col-md-4">
        <div class="form-group">
            <input type="file" class="form-control-file {{ $errors->has('url_img') ? ' is-invalid' : '' }}" name="url_img" id="url_img" required>
            @if ($errors->has('url_img'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('url_img') }}
            </div>
            @endif
            <small id="url_img" class="form-text text-muted">Max. 150Kb | Dimen. 1024 x 700 px</small>
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
@endsection