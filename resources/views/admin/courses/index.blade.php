@extends('layouts.app')
@section('titulo') Cursos @endsection

@section('content')
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>
@endif
<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de Cursos</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/courses/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar </a>
    </section>
</div>

<div class="row">
    <section class="col-12" style="border-top:1px solid #CCCCCC;">
        <h6 class="text-primary">Cursos agregados</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <table class="table table-bordered table-sm" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col" width="8%">Portada </th>
            <th scope="col">Curso</th>
            <th scope="col">Docente</th>
            <th scope="col">Institución</th>
            <th scope="col">Precio Actual</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Estado</th>
            <th scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td> <img src="{{asset('assets/uploads/'.$curso->url_portrait)}}" width="75" alt=""> </td>
            <td class="font-weight-light"> {{ $curso->curso }} </td>
            <td class="font-weight-light"> {{ $curso->docente }} </td>
            <td class="font-weight-light"> {{ $curso->institucion }} </td>
            <td class="font-weight-light"><span class="badge badge-primary">S/. {{$curso->amount}}</span></td>
            <td class="font-weight-light"> {{ $curso->date_start }}</td>
            <td class="font-weight-bold"> <strong><span class="text-success"> {{ $curso->is_free }} </span> </strong></td>
            <td width="18%" class="font-weight-light">
                <a href="{{url('panel/courses/'.$curso->id.'/edit')}}" class="btn btn-info btn-sm"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                <a href="#" class="btn btn-secondary btn-sm"> <i class="fa fa-list-ul" aria-hidden="true"></i> </a>
                <a href="#" class="btn btn-dark btn-sm"> <i class="fa fa-check-square" aria-hidden="true"></i> </a>
                <a href="{{url('panel/courses/'.$curso->id.'/addprice')}}" class="btn btn-warning btn-sm"> <i class="fa fa-credit-card-alt" aria-hidden="true"></i> </a>
                <!-- <a href="#" class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> </a> -->
                
                <form method="post" action="{{ url('panel/courses/'.$curso->id.'/destroy' ) }}" style="display:inline;">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea borrar este curso?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </section>
    <section class="col-12">
    {!!$cursos->render()!!}
    </section>
</div>
@endsection