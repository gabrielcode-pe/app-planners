@extends('layouts.app')
@section('titulo') Docentes @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de Docentes</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar </a>
    </section>
</div>

<div class="row">
    <section class="col-12" style="border-top:1px solid #CCCCCC;">
        <h6 class="text-primary">Docentes registrados</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <table class="table table-bordered" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
                <th width="4%" scope="col">#</th>
                <th scope="col">Foto </th>
                <th scope="col">Nombres completos </th>
                <th scope="col">Perfil </th>
                <th width="10%" scope="col"><i class="fas fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td> <img src="{{asset('assets/images/author1.jpg')}}" width="75" alt=""> </td>
                <td class="font-weight-light">Alan Brito Delgado</td>
                <td class="font-weight-light">
                    <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium vero, a odit non molestias maxime! Facilis, minus. Expedita, rerum inventore vitae ab iste sint, asperiores nihil blanditiis dolores nesciunt culpa?</small>
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