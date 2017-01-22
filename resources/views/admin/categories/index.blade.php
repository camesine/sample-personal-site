@extends('admin.template.main')
@section('title', 'Listado de categorias')

@section('content')

    <table class="table table-striped">
     <thead>
     <td>ID</td>
     <td>Nombre</td>
     <td>Accion</td>
     </thead>
        <tbody>
        @foreach($categories as $category)
        <tr><td>{{$category->id}}</td><td>{{$category->name}}</td>
            <td> <a href="{{ route('admin.categories.edit', $category->id)  }}" class="btn btn-warning" >  <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> </a> <a href="{{ route('admin.categories.destroy', $category->id)  }}" onclick="return confirm('¿Seguro deseas eliminarlo?')" class="btn btn-danger" >  <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a> </td>
        </tr>
        @endforeach

        </tbody>
    </table>

   <div class="text-center">
       {!! $categories->render() !!}
   </div>
    <hr>
    <a href="{{route('admin.categories.create')}}" class="btn btn-info" >Registrar nueva categoria</a>



@endsection