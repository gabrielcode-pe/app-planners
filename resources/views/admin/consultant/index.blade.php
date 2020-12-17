@extends('layouts.app')
@section('titulo') Consultorías @endsection

@section('content')
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>
@endif

<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de consultorías</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/consultant/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar </a>
    </section>
</div>

<div class="row">
    <section class="col-12" style="border-top:1px solid #CCCCCC;">
        <h6 class="text-primary">Consultorías existentes</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <table class="table table-bordered" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
                <th width="4%" scope="col">#</th>
                <th width="10%">Entidad Contratada</th>
                <th width="col">Detalle</th>
                <th scope="15%">Fechas </th>
                <th width="10%" scope="col"><i class="fa fa-cogs" aria-hidden="true"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultancy as $consultant)
            <tr>
                <td scope="row">{{$consultant->nro_order}}</td>
                <td> {{$consultant->customer}} </td>
                <td> <h6><small> {{$consultant->info}} </small></h6> </td>
                <td class="font-weight-light">{{$consultant->fechas}}</td>
                <td class="font-weight-light">
                    <a href="{{url('panel/consultant/'.$consultant->id.'/edit')}}" class="btn btn-info btn-sm" title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>

                    <form method="post" action="{{ url('panel/consultant/'.$consultant->id.'/destroy' ) }}" style="display:inline;">
                     {{csrf_field()}}
                     {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea borrar esta consultoría?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </section>
</div>
@endsection