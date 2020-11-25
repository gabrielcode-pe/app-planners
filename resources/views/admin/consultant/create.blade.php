@extends('layouts.app')
@section('titulo') Registrar nueva consultoría @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Registrar consultoría</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/consultant')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

    <form action="{{ url('/panel/consultant')}}" method="post">
    {{ csrf_field() }}
    <div class="row">    
    <section class="col-12">
        <div class="form-group">
            <textarea name="info" id="info" class="form-control" rows="5" placeholder="Ingrese la información de la consultoría">{{old('info')}}</textarea>
            @if ($errors->has('info'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('info') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12 col-md-8">
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('customer') ? ' is-invalid' : '' }}" id="customer" name="customer" aria-describedby="customer" value="{{old('customer')}}" placeholder="Nombre de la Entidad Contratada" required>
            @if ($errors->has('customer'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('customer') }}
            </div>
            @endif
            <small id="customer" class="form-text text-muted">Max 150 caracteres</small>
        </div>
    </section>

    <section class="col-12 col-md-4">
        <div class="form-group">
            <input type="number" class="form-control {{ $errors->has('nro_order') ? ' is-invalid' : '' }}" id="nro_order" name="nro_order" aria-describedby="nro_order" placeholder="Nro de Consultoría. Ej: 1" value="{{old('nro_order')}}" required>
            @if ($errors->has('nro_order'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('nro_order') }}
            </div>
            @endif
        </div>
    </section>

    <section class="col-12">
        <div class="form-group">
            <input type="text" name="fechas" id="fechas" class="form-control {{ $errors->has('fechas') ? ' is-invalid' : '' }}" placeholder="Fechas Ej: 01/01/2000 - 31/12/2000" value="{{old('fechas')}}" required>
            @if ($errors->has('fechas'))
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $errors->first('fechas') }}
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