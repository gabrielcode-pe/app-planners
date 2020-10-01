@extends('layouts.app')
@section('titulo') Agregar Módulos @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Administrar Módulos</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

<div class="row">    
    <section class="col-12" style="border-top:1px solid #CCCCCC;">        
        <h6 class="text-primary">Agregar Módulo al curso</h6>
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

        <section class="col-12 col-md-3">
            <div class="form-group">
                <input type="file" class="form-control-file" name="imagen" id="imagen">
                <small id="imagen" class="form-text text-muted">Max. 150Kb | Dimen. 1024 x 700 px | Opcional</small>
            </div>
        </section>

        <section class="col-12 col-md-7">
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Ingrese el título del módulo" required>
                <small id="name" class="form-text text-muted">Max. 120 caracteres.</small>
            </div>
            <div class="form-group">
                <textarea name="info" id="info" rows="2" class="form-control" placeholder="Ingrese resumen del texto" required></textarea>
                <small id="info" class="form-text text-muted"><strong>Importante</strong> Si se carga una imagen y una duración, este texto se ocultará.</small>
            </div>  
        </section>

        <section class="col-12 col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" id="duration" name="duration" aria-describedby="duration" placeholder="Duración del video">
                <small id="name" class="form-text text-muted">Ej: 02:54 min</small>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="position" name="position" aria-describedby="duration" placeholder="1">
                <small id="position" class="form-text text-muted">Define el orden del módulo. Ej: 3</small>
            </div>
        </section>

       

    </div>
</form>


<div class="row">
    <section class="col-12">
        <table class="table table-bordered table-sm" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Módulos agregados </th>
            <th scope="col">Información</th>
            <th scope="col" width="10%">Portada</th>
            <th scope="col">Duración</th>
            <th scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td class="font-weight-light">Módulo de Estrategias de Marketing</td>
                <td class="font-weight-light">En este Módulo se repasarán todas las herramientas necesarias para una estrategia</td>
                <td> <img src="{{asset('assets/images/logo-main3.png')}}" width="75" alt=""> </td>
                <td class="font-weight-light">03:52</td>
                <td width="12%" class="font-weight-light">
                    <a href="#" class="btn btn-danger btn-sm" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i> </a>                
                </td>
            </tr>
        </tbody>
        </table>
    </section>
</div>
@endsection