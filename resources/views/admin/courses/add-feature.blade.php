@extends('layouts.app')
@section('titulo') Asignar características a curso {{$curso->name}} @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Asignación de Características</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/courses')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

<div class="row">    
    <section class="col-12" style="border-top:1px solid #CCCCCC;">        
        <h6 class="text-primary">Agregar Característica al curso</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <div class="form-group">
            <input type="text" class="form-control" id="curso" name="curso" aria-describedby="curso" value="{{$curso->name}}" readonly>
        </div>
    </section>
</div>


<form action="{{ url('/panel/courses/addfeature') }}" method="post">
    <div class="row">
    {{ csrf_field() }}
    <input type="hidden" value="{{$curso->id}}" name="course_id">
        <div class="col-12 col-md-4">
            <div class="form-group">
                <select name="ft_icon" id="ft_icon" class="form-control">
                    <option value="certificate.png">Certificación</option>
                    <option value="evaluation.png">Evaluación</option>
                    <option value="guide.png">Guía del participante</option>
                    <option value="lecture.png">Lecturas</option>
                    <option value="live.png">Clases en vivo</option>
                    <option value="video.png">Videos grabados</option>                    
                </select>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" id="info" name="info" placeholder="Ingrese la descripción" required>
                <small id="description" class="form-text text-muted">Max. 100 caracteres</small>
            </div>
        </div>
        <div class="col-12 col-md-2">
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
            <th scope="col">Característica </th>
            <th scope="col"> Descripción </th>
            <th scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
        @foreach($curso->features as $index => $feature)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td class="font-weight-light"> <img src="{{asset('assets/images/'.$feature->ft_icon)}}" width="15" alt=""> </td>
                <td class="font-weight-light">{{$feature->info}} </td>
                <td width="12%" class="font-weight-light">
                    <form method="post" action="{{ url('panel/courses/'.$curso->id.'/addfeature/'.$feature->id) }}" style="display:inline;">
                     {{csrf_field()}}
                     {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar esta categoría?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </form>              
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </section>
</div>
@endsection