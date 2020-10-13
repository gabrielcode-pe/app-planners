@extends('layouts.app')
@section('titulo') Modificar curso {{$curso->curso}} @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Modificar curso {{$curso->curso}}</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/courses/')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/courses/'.$curso->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT')}}
    <div class="row">    
    <section class="col-12">
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" aria-describedby="name" placeholder="Ingrese el nombre del curso" value="{{$curso->curso}}" required>
            @if ($errors->has('name'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            @endif
            <small id="name" class="form-text text-muted">Max. 200 caracteres.</small>
        </div>
    </section>

    <section class="col-12">
        <div class="form-group">
            <textarea name="summary" id="summary" rows="2" class="form-control {{ $errors->has('summary') ? ' is-invalid' : '' }}" placeholder="Ingrese resumen del texto" required>{{$curso->seo}}</textarea>
            @if ($errors->has('summary'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('summary') }}
            </div>
            @endif
            <small id="summary" class="form-text text-muted">Max. 120 caracteres.</small>
        </div>
    </section>

    <section class="col-12 col-md-3">
        <div class="form-group">
            <label for="status">Modalidad</label>
            <select name="status" id="status" class="form-control">
                @if($curso->is_free==1)
                    <option selected value="1">Gratuito</option>
                    <option value="0">Pago</option>                    
                @else
                    <option value="1">Gratuito</option>
                    <option selected value="0">Pago</option>
                @endif
            </select>
        </div>
    </section>
    <section class="col-12 col-md-3">
        <div class="form-group">
            <label for="institution">Instituciones</label>
            <select name="institution" id="institution" class="form-control">
                @foreach($institutions as $institution)
                    @if($institution->id==$curso->institucion_id)
                    <option value="{{ $institution->id }}" selected> {{$institution->name}} </option>
                    @else
                    <option value="{{ $institution->id }}"> {{$institution->name}} </option>
                    @endif                    
                @endforeach
            </select>
        </div>
    </section>
    <section class="col-12 col-md-3">
        <div class="form-group">
            <label for="instructor">Docentes</label>
            <select name="instructor" id="instructor" class="form-control">
                @foreach($instructors as $instructor)
                    @if($instructor->id==$curso->docente_id)
                    <option selected value="{{ $instructor->id }}"> {{$instructor->name}} </option>
                    @else
                    <option value="{{ $instructor->id }}"> {{$instructor->name}} </option>
                    @endif
                @endforeach
            </select>
        </div>
    </section>
    <section class="col-12 col-md-3">
        <div class="form-group">
            <label for="date_start">Fecha de Inicio</label>
            <input type="date" step="1" class="form-control {{ $errors->has('date_start') ? ' is-invalid' : '' }}" name="date_start" id="date_start" value="{{ date($curso->date_start) }}">
            @if ($errors->has('date_start'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('date_start') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12 col-md-8">
        <div class="form-group">
            <textarea name="info" id="info" rows="4" class="form-control ckeditor {{ $errors->has('info') ? ' is-invalid' : '' }}" placeholder="Ingrese aqui la información del curso a detalle">{{$curso->info}}</textarea>
            @if ($errors->has('info'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('info') }}
            </div>
            @endif
        </div>
    </section>
    <section class="col-12 col-md-4">
        <div class="form-group">
            <img src="{{asset('assets/uploads/'.$curso->url_portrait)}}" class="img-fluid" alt="">
            <input type="file" class="form-control-file {{ $errors->has('info') ? ' is-invalid' : '' }}" name="url_portrait" id="url_portrait">
            @if ($errors->has('url_portrait'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('url_portrait') }}
            </div>
            @endif
            <small id="url_portrait" class="form-text text-muted">Max. 150Kb | Dimen. 1024 x 700 px</small>
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </section>
    </div>
    </form>
    

@endsection