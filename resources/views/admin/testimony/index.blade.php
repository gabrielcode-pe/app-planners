@extends('layouts.app')
@section('titulo') Testimonios @endsection

@section('content')
<div class="row mb-2">
    <section class="col-10">
        <h5>Gestión de Testimonios</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="#" class="btn btn-success btn-sm"> <i class="fas fa-plus-circle"></i> Agregar </a>
    </section>
</div>

<div class="row">
    <section class="col-12" style="border-top:1px solid #CCCCCC;">
        <h6 class="text-primary">Testimonios registrados</h6>
    </section>
</div>

<div class="row">
    <section class="col-12">
        <table class="table table-bordered" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
                <th width="4%" scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nombres completos</th>
                <th scope="col">Descripción</th>
                <th scope="col">Empresa</th>
                <th scope="col">Cargo</th>
                <th width="10%" scope="col"><i class="fas fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td> <img src="{{asset('assets/images/author1.jpg')}}" width="75" alt=""> </td>
                <td class="font-weight-light">Alan Brito Delgado</td>
                <td class="font-weight-light"><small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed vero rem nesciunt ipsum quisquam voluptatibus cumque, eos, similique amet doloribus libero. Nam sed alias veritatis hic tempore facilis iusto reiciendis!</small></td>
                <td class="font-weight-light">Corporación</td>
                <td class="font-weight-light">Gerente General</td>
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