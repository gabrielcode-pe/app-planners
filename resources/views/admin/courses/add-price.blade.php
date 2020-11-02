@extends('layouts.app')
@section('titulo') Asignar precio a curso {{$curso->name}} @endsection

@section('content')
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>
@endif
<div class="row mb-2">
    <section class="col-10">
        <h5>Asignación de Precios</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/courses')}}" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver </a>
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
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{$curso->name}}" readonly>
        </div>
    </section>
</div>


<form action="{{ url('/panel/courses/addprice') }}" method="post">
    <div class="row">
    {{ csrf_field() }}
        <input type="hidden" value="{{$curso->id}}" name="course_id">
        <div class="col-12 col-md-2">
            <div class="form-group">
                <input type="text" class="form-control" id="price" name="price" placeholder="0.00" required>
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
            <div class="form-group">
                <select name="status" id="status" class="form-control">
                    <option value="1" selected>Activo</option>
                    <option value="0">Oculto</option>
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
            <th scope="col"> Monto registrados </th>
            <th scope="col"> Descripción </th>
            <th scope="col"> Activo </th>
            <th scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $price)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td class="font-weight-light">S/. {{$price->amount}} </td>
                <td class="font-weight-light">{{ $price->price_info }}</td>
                <td class="font-weight-light">{{ $price->is_active }}</td>
                <td width="12%" class="font-weight-light">
                    <!-- <a href="#" class="btn btn-danger btn-sm" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i> </a> -->

                    <form method="post" action="{{ url('panel/courses/'.$curso->id.'/addprice/'.$price->precio_id) }}" style="display:inline;">
                     {{csrf_field()}}
                     {{ method_field('PUT')}}
                        <button type="submit" class="btn btn-success btn-sm" title="Activar"> <i class="fa fa-toggle-on" aria-hidden="true"></i>  </button>
                    </form>
                    
                    <form method="post" action="{{ url('panel/courses/'.$curso->id.'/addprice/'.$price->precio_id) }}" style="display:inline;">
                     {{csrf_field()}}
                     {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar este precio?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </form>
                </td>
            </tr>
            @endforeach            
        </tbody>
        </table>
    </section>
</div>
@endsection