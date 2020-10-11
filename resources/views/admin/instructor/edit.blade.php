@extends('layouts.app')
@section('titulo') Actualizar docente {{$instructor->name}} @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Actualizar Docente</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/instructor')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/instructor/'.$instructor->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT')}}
    <div class="row">    
    <section class="col-12 col-md-3">
    <div class="form-group">
            <img src="{{asset('assets/uploads/'.$instructor->url_img)}}" alt="" class="img-fluid">
            <input type="file" class="form-control-file {{ $errors->has('url_portrait') ? ' is-invalid' : '' }}" name="url_portrait" id="url_portrait">
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
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" aria-describedby="name" value="{{$instructor->name}}" required>
            @if ($errors->has('name'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            @endif
            <small id="name" class="form-text text-muted">Max. 255 caracteres.</small>
        </div>
        <div class="form-group">
            <textarea name="summary" id="summary" rows="3" class="form-control {{ $errors->has('summary') ? ' is-invalid' : '' }}" placeholder="Ingrese resumen del Docente" required>{{$instructor->info}}</textarea>
            @if ($errors->has('summary'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('summary') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </section>
    </div>
    </form>
    

@endsection