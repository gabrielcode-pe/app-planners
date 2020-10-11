@extends('layouts.app')
@section('titulo') Registrar imagen @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar imagen</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/picture')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/picture') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <section class="col-12 col-md-4">
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
    
        <section class="col-12 col-md-8">
            <div class="form-group">
                <textarea name="tag" id="tag" rows="3" class="form-control" placeholder="Ingrese leyenda de la imagen"></textarea>
            </div>
        </section>

    <section class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </section>
    </div>
    </form>
    

@endsection