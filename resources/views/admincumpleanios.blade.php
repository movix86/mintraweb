@extends('home.base')
@section('nav')
    <x-nav/>
@endsection
<title>Administradores de cumpleaños</title>
@section('contenido')
	<link rel="stylesheet" type="text/css" href="{{asset('css/footerInterno.css')}}">

	<form action="administradoresCumpleanios" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="col-md-6">
            <br><br>
            <label>Nombre del usuario: </label>
            <input type="name" name="name" placeholder="Nombre del usuario"><br>
            <label>Correo electrónico *: </label>
            <input type="email" name="correo" placeholder="user@uniagustiniana.edu.co"><br>
            <center>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </center>
            <br><br>
        </div>
	</form>

	<div class="footer">
		<x-footer/>	
	</div>
@stop