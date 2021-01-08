@extends('layouts.app')
@section('titulo') Editar medida de {{$service->title}} @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Actualizar medida</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/medida')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>
    <form action="{{ url('/panel/medida/'.$service->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT')}}

    <div class="row">

        <section class="col-12 col-md-10">
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" aria-describedby="title" placeholder="Ingrese el título" value="{{$service->title}}" required>
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
                <input type="number" class="form-control {{ $errors->has('nro_order') ? ' is-invalid' : '' }}" id="nro_order" name="nro_order" aria-describedby="nro_order" placeholder="Orden. Ej: 1" value="{{$service->nro_order}}" required>
                @if ($errors->has('nro_order'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('nro_order') }}
                </div>
                @endif
            </div>
        </section>

        <section class="col-12 col-md-8">
            <div class="form-group">
                <textarea name="info" id="info" class="form-control ckeditor {{ $errors->has('info') ? ' is-invalid' : '' }}" rows="5" placeholder="Ingrese la información de la medida">{{$service->info}}</textarea>                
                @if ($errors->has('info'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('info') }}
                </div>
                @endif
            </div>
        </section>

        <section class="col-12 col-md-4">
            <div class="form-group">
                <img src="{{asset('assets/uploads/'.$service->url_img)}}" class="img-fluid" alt="">

                <input type="file" class="form-control-file {{ $errors->has('url_img') ? ' is-invalid' : '' }}" name="url_img" id="url_img">
                @if ($errors->has('url_img'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('url_img') }}
                </div>
                @endif
                <small id="url_img" class="form-text text-muted">Max. 150Kb | Dimen. 1024 x 700 px</small>
            </div>
        </section>  

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </section>
    </div>
    </form>
@endsection