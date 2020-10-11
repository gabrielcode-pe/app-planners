@extends('layouts.app')
@section('titulo') Imágenes @endsection

@section('content')
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>
@endif
<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de imágenes</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/picture/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar </a>
    </section>
</div>

<div class="row">
    <section class="col-12" style="border-top:1px solid #CCCCCC;">
        <h6 class="text-primary">Imágenes registradas</h6>
    </section>
</div>

<div class="row">
    @foreach($pictures as $picture)
    <section class="col-6 col-md-2">
        <table class="table table-bordered">
            <tr>
                <td>
                    <img src="{{asset('assets/uploads/'.$picture->url_picture)}}" class="img-fluid" alt="">
                </td>
            </tr>
            <tr>
                <td align="center"><small>{{$picture->tag}}</small></td>
            </tr>
            <tr>
                <td align="center">
                    <form method="post" action="{{ url('panel/picture/'.$picture->id.'/destroy' ) }}" style="display:inline;">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea borrar esta imagen?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                    </form> 
                </td>
            </tr>
        </table>
    </section>
    @endforeach
    <!-- <section class="col-12">
        <table class="table table-bordered" style="font-size: 0.9rem !important;">
        <thead class="thead-dark">
            <tr>
                <th width="4%" scope="col">#</th>
                <th width="10%" scope="col">Portada</th>
                <th scope="col">Tags</th>
                <th width="10%" scope="col"> <i class="fa fa-cogs" aria-hidden="true"></i>  </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td> <img src="{{asset('assets/images/post-portrait.png')}}" width="75" alt=""> </td>
                <td class="font-weight-light">Portada Marketing Cursos</td>
                <td class="font-weight-light">
                    <a href="#" class="btn btn-info btn-sm" title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                    <a href="#" class="btn btn-danger btn-sm" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i> </a>                
                </td>
            </tr>
        </tbody>
        </table>
    </section> -->
</div>
<div class="row">
    <section class="col-12">{!!$pictures->render()!!}</section>
</div>
@endsection