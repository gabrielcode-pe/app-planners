@extends('layouts.app')
@section('titulo') Registrar curso @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar curso</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/courses')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/courses') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">    
    <section class="col-12 col-md-10">
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" aria-describedby="name" placeholder="Ingrese el nombre del curso" value="{{old('name')}}" required>
            @if ($errors->has('name'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            @endif
            <small id="name" class="form-text text-muted">Max. 200 caracteres.</small>
        </div>
    </section>

    <section class="col-12 col-md-2">
        <div class="form-group">
        <input type="number" class="form-control {{ $errors->has('places') ? ' is-invalid' : '' }}" id="places" name="places" aria-describedby="places" placeholder="Ingrese nro de plazas para el curso" value="{{old('places')}}" required>
            @if ($errors->has('places'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('places') }}
            </div>
            @endif
            <small id="places" class="form-text text-muted">Vacantes disponibles</small>
        </div>
        
    </section>

    <section class="col-12">
        <div class="form-group">
            <textarea name="summary" id="summary" rows="2" class="form-control {{ $errors->has('summary') ? ' is-invalid' : '' }}" placeholder="Ingrese resumen del texto" required>
                {{old('summary')}}
            </textarea>
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
                <option value="1">Gratuito</option>
                <option value="0">Pago</option>
            </select>
        </div>
    </section>
    <section class="col-12 col-md-3">
        <div class="form-group">
            <label for="institution">Instituciones</label>
            <select name="institution" id="institution" class="form-control">
                @foreach($institutions as $institution)
                    <option value="{{ $institution->id }}"> {{$institution->name}} </option>
                @endforeach
            </select>
        </div>
    </section>
    <section class="col-12 col-md-3">
        <div class="form-group">
            <label for="instructor">Docentes</label>
            <select name="instructor" id="instructor" class="form-control">
                @foreach($instructors as $instructor)
                    <option value="{{ $instructor->id }}"> {{$instructor->name}} </option>
                @endforeach
            </select>
        </div>
    </section>
    <section class="col-12 col-md-3">
        <div class="form-group">
            <label for="date_start">Fecha de Inicio</label>
            <input type="date" step="1" class="form-control {{ $errors->has('date_start') ? ' is-invalid' : '' }}" name="date_start" id="date_start" value="{{ date('Y-m-d') }}">
            @if ($errors->has('date_start'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('date_start') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12 col-md-7">
        <div class="form-group">
            <textarea name="info" id="info" rows="4" class="form-control {{ $errors->has('info') ? ' is-invalid' : '' }} ckeditor" placeholder="Ingrese aqui la información del curso a detalle">
                {{ old('info') }}
            </textarea>
            @if ($errors->has('info'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('info') }}
            </div>
            @endif
        </div>
    </section>
    <section class="col-12 col-md-5">
        <div class="form-group">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">https://www.youtube.com/watch?v=</div>
                </div>
                <input type="text" class="form-control {{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" id="video" placeholder="a1E2i3O4u56" value="{{old('video')}}">
                @if ($errors->has('video'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('video') }}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file {{ $errors->has('url_portrait') ? ' is-invalid' : '' }}" name="url_portrait" id="url_portrait" required>
            @if ($errors->has('url_portrait'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('url_portrait') }}
            </div>
            @endif
            <small id="url_portrait" class="form-text text-muted">Max. 150Kb | Dimen. 1024 x 700 px</small>
        </div>
    </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection