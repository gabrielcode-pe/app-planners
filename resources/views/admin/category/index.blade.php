@extends('layouts.app')
@section('titulo') Categorías @endsection

@section('content')
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>
@endif

<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de categorías</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/category/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar </a>
    </section>
</div>

<div class="row">
    <section class="col-12" style="border-top:1px solid #CCCCCC;">
        <h6 class="text-primary">Categorías existentes</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <table class="table table-bordered" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
                <th width="4%" scope="col">#</th>
                <th width="10%">Imagen</th>
                <th scope="col">Categoría </th>
                <th width="10%" scope="col"><i class="fa fa-cogs" aria-hidden="true"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td> <img src="{{asset('assets/uploads/'.$categoria->url_portrait)}}" width="75" alt=""> </td>
                <td class="font-weight-light">{{$categoria->name}}</td>
                <td class="font-weight-light">
                    <a href="{{url('panel/category/'.$categoria->id.'/edit')}}" class="btn btn-info btn-sm" title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>

                    <form method="post" action="{{ url('panel/category/'.$categoria->id.'/destroy' ) }}" style="display:inline;">
                     {{csrf_field()}}
                     {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea borrar esta categoría?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </section>
</div>
@endsection