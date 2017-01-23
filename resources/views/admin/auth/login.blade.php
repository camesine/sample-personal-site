@extends('admin.template.main')
@section('title','Login')

@section('content')

    {!! Form::open(["route" => 'admin.auth.login', "method" => "POST"]) !!}
    <div class="form-group">

        {!! Form::label("Email", "Correo electronico") !!}
        {!! Form::email("email",null,['class' => 'form-control', 'placeholder' => "example@email.com"]) !!}


    </div>

    <div class="form-group">

        {!! Form::label("password", "Contraseña") !!}
        {!! Form::password("password",['class' => 'form-control', 'placeholder' => "***********"]) !!}

    </div>

    <div class="form-group">

        {!! Form::submit('Entrar',["class" => "btn btn-primary"]) !!}

    </div>

    {!! Form::close() !!}
@endsection