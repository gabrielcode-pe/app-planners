@extends('layouts.app')
@section('titulo') Clientes @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de Clientes</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar </a>
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
                <th width="10%" scope="col"><i class="fas fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td> <img src="{{asset('assets/images/logo-main3.png')}}" width="75" alt=""> </td>
                <td class="font-weight-light">Escuela de Proyectistas</td>
                <td class="font-weight-light">
                    <a href="#" target="_blank" class="btn btn-outline-success btn-sm"><i class="fas fa-globe"></i> Visitar sitio</a>
                </td>
                <td class="font-weight-light">
                    <a href="#" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>                
                </td>
            </tr>
        </tbody>
        </table>
    </section>
</div>
@endsection