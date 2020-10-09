@extends('layouts.app')
@section('titulo') Agregar Módulos para {{$curso->name}} @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Administrar Módulos</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/courses')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

<div class="row">    
    <section class="col-12" style="border-top:1px solid #CCCCCC;">        
        <h6 class="text-primary">Agregar Módulo {{ $curso->name }}</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ $curso->name }}" readonly>
        </div>
    </section>
</div>


<form action="{{ url('/panel/courses/addmodule') }}" method="post" enctype="multipart/form-data">
    <div class="row">
    {{ csrf_field() }}
        <input type="hidden" value="{{$curso->id}}" name="course_id">
        <section class="col-12 col-md-3">
            <div class="form-group">
                <input type="file" class="form-control-file {{ $errors->has('url_img') ? ' is-invalid' : '' }}" name="url_img" id="url_img">
                @if ($errors->has('url_img'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('url_img') }}
                </div>
                @endif
                <small id="url_img" class="form-text text-muted">Max. 150Kb | Dimen. 1024 x 700 px | Opcional</small>
            </div>
        </section>

        <section class="col-12 col-md-7">
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" aria-describedby="name" placeholder="Ingrese el título del módulo" required>
                @if ($errors->has('name'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
                @endif
                <small id="name" class="form-text text-muted">Max. 120 caracteres.</small>
            </div>
            <div class="form-group">
                <textarea name="info" id="info" rows="2" class="form-control {{ $errors->has('info') ? ' is-invalid' : '' }}" placeholder="Ingrese resumen del texto" required></textarea>
                @if ($errors->has('info'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('info') }}
                </div>
                @endif
                <small id="info" class="form-text text-muted">Max. 255 caracteres<strong>Importante</strong> Si se carga una imagen y una duración, este texto se ocultará.</small>
            </div>  
        </section>

        <section class="col-12 col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" id="duration" name="duration" aria-describedby="duration" placeholder="Duración del video">
                <small id="name" class="form-text text-muted">Ej: 02:54 min</small>
            </div>
            <div class="form-group">
                <input type="number" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" id="position" name="position" ria-describedby="duration" placeholder="1" required>
                @if ($errors->has('position'))
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $errors->first('position') }}
                </div>
                @endif
                <small id="position" class="form-text text-muted">Define el orden del módulo. Ej: 3</small>
            </div>
        </section>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary"> <i class="fa fa-plus-square" aria-hidden="true"></i> Agregar</button>
        </div>
    </div>
</form>


<div class="row">
    <section class="col-12">
        <table class="table table-bordered table-sm" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Módulos agregados </th>
            <th scope="col">Información</th>
            <th scope="col" width="10%">Portada</th>
            <th scope="col">Duración</th>
            <th scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
            <tr>
                <td scope="row">{{ $module->position }}</td>
                <td class="font-weight-light"> {{ $module->name }} </td>
                <td class="font-weight-light"> {{ $module->info }} </td>
                <td> <img src="{{asset('assets/uploads/'.$module->url_img)}}" width="75" alt=""> </td>
                <td class="font-weight-light"> {{$module->duration}} </td>
                <td width="12%" class="font-weight-light">                    
                    <form method="post" action="{{ url('panel/courses/'.$module->course_id.'/addmodule/'.$module->id) }}" style="display:inline;">
                     {{csrf_field()}}
                     {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar este Módulo?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </section>
</div>
@endsection