@extends('layouts.app')
@section('titulo') Actualizar publicación {{$post->title}} @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar publicación</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/post')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/post/'.$post->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT')}}
    <div class="row">
        <section class="col-12 col-md-3">
            <div class="form-group">
                <img src="{{asset('assets/uploads/'.$post->url_portrait)}}" class="img-fluid" alt="">

                <input type="file" class="form-control-file {{ $errors->has('url_portrait') ? ' is-invalid' : '' }}" name="url_portrait" id="url_portrait">
                @if ($errors->has('url_portrait'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('url_portrait') }}
                </div>
                @endif
                <small id="url_portrait" class="form-text text-muted">Max. 150Kb | Dimen. 1024 x 700 px</small>
            </div>
        </section>       
    
        <section class="col-12 col-md-9">
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" aria-describedby="title" placeholder="Ingrese el título de la publicación" value="{{$post->title}}">
                @if ($errors->has('title'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
                @endif
                <small id="title" class="form-text text-muted">Max. 200 caracteres.</small>
            </div>
            <div class="form-group">
                <textarea name="summary" id="summary" rows="2" class="form-control {{ $errors->has('summary') ? ' is-invalid' : '' }}" placeholder="Ingrese resumen del texto">{{$post->summary}}</textarea>
                @if ($errors->has('summary'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('summary') }}
                </div>
                @endif
            </div>
        </section>


    <section class="col-12">
        <div class="form-group">
            <textarea name="body" id="body" rows="3" class="form-control ckeditor {{ $errors->has('body') ? ' is-invalid' : '' }}" placeholder="Ingrese aqui la información del curso a detalle">{{$post->title}}</textarea>
            @if ($errors->has('body'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('body') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12 col-md-4">
        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" id="status" class="form-control">
                @if($post->status!=1)
                    <option value="0" selected>Borrador</option>
                    <option value="1">Publicado</option>                  
                @else
                    <option value="1" selected>Publicado</option>
                    <option value="0">Borrador</option>                   
                @endif
            </select>
        </div>
    </section>
    <section class="col-12 col-md-4">
        <div class="form-group">
            <label for="category">Categoría</label>
            <select name="category" id="category" class="form-control">
                @foreach ($categories as $category)
                    <option {{$category->id == $post->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </section>
    <section class="col-12 col-md-4">
        <div class="form-group">
            <label for="post_source">Fuente</label>
            <input type="text" name="post_source" id="post_source" class="form-control {{ $errors->has('post_source') ? ' is-invalid' : '' }}" value="{{$post->post_source}}">
            @if ($errors->has('post_source'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('post_source') }}
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