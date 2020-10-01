@extends('layouts.app')
@section('titulo') Asignar precio a curso @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Asignación de Precios</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
    </section>
</div>

<div class="row">    
    <section class="col-12" style="border-top:1px solid #CCCCCC;">        
        <h6 class="text-primary">Agregar Precio al curso</h6>
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
        <div class="col-12 col-md-4">
            <div class="form-group">
                <input type="number" class="form-control" id="price" name="price" placeholder="0.00" required>
                <small id="price" class="form-text text-muted">Solo números</small>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" id="description" name="description" placeholder="Descripcion del Monto" required>
                <small id="description" class="form-text text-muted">Max. 25 caracteres</small>
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
            <th scope="col"> Monto registrados </th>
            <th scope="col"> Descripción </th>
            <th scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td class="font-weight-light">S/. 150.00</td>
                <td class="font-weight-light">Precio Base</td>
                <td width="12%" class="font-weight-light">
                    <a href="#" class="btn btn-danger btn-sm" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i> </a>                
                </td>
            </tr>
        </tbody>
        </table>
    </section>
</div>
@endsection