@extends('layouts.app')
@section('titulo') Posts @endsection

@section('content')
@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>
@endif
<div class="row mb-2">
    <section class="col-10">
        <h5>Administración de Posts</h5>
    </section>
    <section class="col-2 d-flex justify-content-end">
        <a href="{{url('panel/post/create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar </a>
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
            @foreach($posts as $post)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td> <img src="{{asset('assets/uploads/'.$post->url_portrait)}}" width="75" alt=""> </td>
                <td class="font-weight-light">{{$post->title}}</td>
                <td class="font-weight-light">{{$post->created_at}}</td>
                <td class="font-weight-light">{{$post->category->name}}</td>
                <td class="font-weight-bold">
                    @if($post->status!=1)
                        <strong><span class="text-secondary">Borrador</span> </strong>
                    @else
                        <strong><span class="text-success">Publicado</span> </strong>
                    @endif
                </td>
                <td class="font-weight-light">                    
                    <a href="{{url('panel/post/'.$post->id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>                    
                    <form method="post" action="{{ url('panel/post/'.$post->id.'/destroy' ) }}" style="display:inline;">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Desea borrar esta publicación?')" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i>  </button>
                    </form>  
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </section>
    <section class="col-12"> {!!$posts->render()!!} </section>
</div>
@endsection