@extends('layouts.app')
@section('titulo') Posts @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de Posts</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar </a>
    </section>
</div>

<div class="row">
    <section class="col-12" style="border-top:1px solid #CCCCCC;">
        <h6 class="text-primary">Posts registrados</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <table class="table table-bordered" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
                <th width="4%" scope="col">#</th>
                <th width="10%" scope="col">Portada</th>
                <th scope="col">Título</th>
                <th scope="col">Registro</th>
                <th scope="col">Categoría</th>
                <th scope="col">Visible</th>
                <th width="10%" scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i>  </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td> <img src="{{asset('assets/images/post-portrait.png')}}" width="75" alt=""> </td>
                <td class="font-weight-light">La Escuela de Proyectistas</td>
                <td class="font-weight-light">5/10/2020</td>
                <td class="font-weight-light">Coaching</td>
                <td class="font-weight-bold"> <strong><span class="text-success">Publicado</span> </strong></td>
                <td class="font-weight-light">
                    <a href="#" class="btn btn-info btn-sm" title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                    <a href="#" class="btn btn-danger btn-sm" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i> </a>                
                </td>
            </tr>
        </tbody>
        </table>
    </section>
</div>
@endsection