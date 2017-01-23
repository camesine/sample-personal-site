@extends('admin.template.main')

@section('title', 'Listado de tags')

@section('content')

    {!! Form::open(['route' => 'admin.tags.index', 'method' => 'GET' , 'class' => 'navbar-form pull-right']) !!}

    <div class="input-group">

        {!! Form::text("name" , null , ['class' => 'form-control', 'placeholder' => 'Buscar tag', 'aria-describedby', 'id' => 'search' ]) !!}
        <span class="input-group-addon" id="search"> <span class="glyphicon glyphicon-search" aria-hidden="true" id="search"></span> </span>
    </div>

    {!! Form::close() !!}
    <table class="table table-striped">
        <thead>
        <td>ID</td>
        <td>Nombre</td>
        <td>Accion</td>
        </thead>
        <tbody>
        @foreach($tags as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
            <td> <a href="{{ route('admin.tags.edit', $tag->id)  }}" class="btn btn-warning" >  <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> </a> <a href="{{ route('admin.tags.destroy', $tag->id)  }}" onclick="return confirm('¿Seguro deseas eliminarlo?')" class="btn btn-danger" >  <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a> </td>
        </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        {!! $tags->render() !!}
    </div>
    <hr>
    <a href="{{route('admin.tags.create')}}" class="btn btn-info" >Registrar nuevo tag</a>


@endsection