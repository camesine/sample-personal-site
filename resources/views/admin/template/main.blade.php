<!DOCTYPE html>
<html>
<head>
	<title> @yield('title', 'default')  | Panel de administracion</title>
	<link rel="stylesheet" type="text/css" href="{{ asset("css/bootstrap.min.css") }}">
	<script type="text/javascript" src="{{ asset('js/jquery-1.11.1.js') }}" ></script>
    <script src="{{asset('chosen/chosen.jquery.js')}}" ></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <link rel="stylesheet" href="{{ asset('chosen/chosen.css') }}">
    <script type="text/javascript" src="{{asset('Trumbowyg/Trumbowyg.js')}}" ></script>
    <link rel="stylesheet" href="{{asset('Trumbowyg/ui/Trumbowyg.css')}}">
    @yield('js')


</head>
<body>
<div class="container">

	@include('admin.template.partials.nav')
	<section>


        <div class="panel panel-default">
            <div class="panel-heading">@yield('title', 'default')</div>
            <div class="panel-body">
                @include('flash::message')
                    @include('admin.template.partials.errors')
                @yield('content')

            <!--    <a href="" class="btn btn-success" >Boton bootstrap</a> -->
            </div>
        </div>

	</section>

    <div class="panel panel-default">
        <div class="panel-heading">TODOS LOS DERECHOS RESERVADOS 2015</div>

    </div>

</div>
</body>
</html>