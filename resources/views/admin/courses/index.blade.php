@extends('layouts.app')
@section('titulo') Cursos @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de Cursos</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-success btn-sm"> <i class="fas fa-plus-circle"></i> Agregar </a>
    </section>
</div>

<div class="row">
    <section class="col-12" style="border-top:1px solid #CCCCCC;">
        <h6 class="text-primary">Cursos agregados</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <table class="table table-bordered" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Portada </th>
            <th scope="col">Curso</th>
            <th scope="col">Categoría</th>
            <th scope="col">Precio Actual</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Estado</th>
            <th scope="col"><i class="fas fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td> <img src="{{asset('assets/images/course-image.png')}}" width="75" alt=""> </td>
            <td class="font-weight-light">Curso de Prueba para Proyectistas</td>
            <td class="font-weight-light">Marketing</td>
            <td class="font-weight-light"><span class="badge badge-primary">S/. 150.00</span></td>
            <td class="font-weight-light">5-10-2020</td>
            <td class="font-weight-bold"> <strong><span class="text-success">Activo</span> </strong></td>
            <td width="18%" class="font-weight-light">
                <a href="#" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-success btn-sm"><i class="fas fa-chalkboard-teacher"></i></a>
                <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-users"></i></a>
                <a href="#" class="btn btn-warning btn-sm"> <i class="far fa-money-bill-alt"></i> </a>
                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>                
            </td>
            </tr>
        </tbody>
        </table>
    </section>
</div>
@endsection