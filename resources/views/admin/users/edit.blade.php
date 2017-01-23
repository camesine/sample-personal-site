@extends('admin.template.main')

@section('title', 'Editar Usuario ' . $user->name )

@section('content')

    {!! Form::open(['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
    <div class="form-group">
        {!! Form::label('name','Nombre') !!}
        {!! Form::text('name', $user->name, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre completo']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Email','Correo electronico') !!}
        {!! Form::email('email', $user->email, ['class' => 'form-control', 'required', 'placeholder' => 'example@email.com']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type','Tipo') !!}
        {!! Form::select('type', ['' => 'Seleccione un nivel', 'member' => 'Miembro', 'admin' => 'Administrador'],$user->type, ['class' => 'form-control', 'id' => 'type'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection