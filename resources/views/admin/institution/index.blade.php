@extends('layouts.app')
@section('titulo') Clientes @endsection

@section('content')
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>
@endif
<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de Clientes</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/institution/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar </a>
    </section>
</div>

<div class="row">
    <section class="col-12" style="border-top:1px solid #CCCCCC;">
        <h6 class="text-primary">Clientes registrados</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <table class="table table-bordered" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
                <th width="4%" scope="col">#</th>
                <th width="10%" scope="col">Logo </th>
                <th scope="col">Empresa</th>
                <th scope="col">Web </th>
                <th width="10%" scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($institutions as $institution)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td> <img src="{{asset('assets/uploads/'.$institution->url_logo)}}" width="75" alt=""> </td>
                <td class="font-weight-light">{{$institution->name}}</td>
                <td class="font-weight-light">
                    <a href="{{$institution->url_web}}" target="_blank" class="btn btn-outline-success btn-sm"> <i class="fa fa-external-link" aria-hidden="true"></i> Visitar sitio</a>
                </td>
                <td class="font-weight-light">
                    <a href="{{url('panel/institution/'.$institution->id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    
                    <form method="post" action="{{ url('panel/institution/'.$institution->id.'/destroy' ) }}" style="display:inline;">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea borrar este cliente?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </section>
    <section class="col-12">
    {!!$institutions->render()!!}
    </section>
</div>
@endsection