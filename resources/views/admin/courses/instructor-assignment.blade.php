@extends('layouts.app')
@section('titulo') Asignar Docente a curso @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Asignación de Docentes</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

<div class="row">    
    <section class="col-12" style="border-top:1px solid #CCCCCC;">        
        <h6 class="text-primary">Agregar Docente al curso</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="Curso de Coaching parte I" readonly>
        </div>
    </section>
</div>


<form>
    <div class="row">
    {{ csrf_field() }}
        <div class="col-12 col-md-10">
            <div class="form-group">
                <label class="sr-only" for="instructor">Name</label>
                <select class="form-control" name="instructor" id="instructor">
                    <option value="1">Alan Brito Delgado</option>
                    <option value="2">Armando Casas Rojas</option>
                </select>
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
            <th scope="col"> Docentes agregados </th>
            <th scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td class="font-weight-light">Curso de Prueba para Proyectistas</td>
                <td width="12%" class="font-weight-light">
                    <a href="#" class="btn btn-danger btn-sm" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i> </a>                
                </td>
            </tr>
        </tbody>
        </table>
    </section>
</div>
@endsection