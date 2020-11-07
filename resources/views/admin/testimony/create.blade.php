@extends('layouts.app')
@section('titulo') Registrar testimonio @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar Testimonio</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/testimony')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/testimony') }}" method="post" enctype="multipart/form-data">
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

    <section class="col-12 col-md-9">
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" aria-describedby="name" value="{{old('name')}}" placeholder="Nombre completo" required>
            @if ($errors->has('name'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            @endif
            <small id="name" class="form-text text-muted">Max. 255 caracteres.</small>
        </div>
        <div class="form-group">
            <textarea name="body" id="body" rows="5" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}">{{old('body')}}</textarea>
            @if ($errors->has('body'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('body') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('jobtitle') ? ' is-invalid' : '' }}" id="jobtitle" name="jobtitle" aria-describedby="jobtitle" value="{{old('jobtitle')}}" placeholder="Cargo" required>
            @if ($errors->has('jobtitle'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('jobtitle') }}
            </div>
            @endif
            <small id="jobtitle" class="form-text text-muted">Max. 60 caracteres.</small>
        </div>
    </section>

    <section class="col-12 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('company') ? ' is-invalid' : '' }}" id="company" name="company" aria-describedby="company" placeholder="Empresa" value="{{old('company')}}" required>
            @if ($errors->has('company'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('company') }}
            </div>
            @endif
            <small id="company" class="form-text text-muted">Max. 60 caracteres.</small>
        </div>
    </section>


    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection