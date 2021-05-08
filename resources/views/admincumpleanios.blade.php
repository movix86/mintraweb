@extends('home.base')
@section('nav')
    <x-nav/>
@endsection
<title>Administradores de cumpleaños</title>
@section('contenido')
	<link rel="stylesheet" type="text/css" href="{{asset('css/footerInterno.css')}}">
	<div class="container">
		<div class="row">
	    	<div class="col-sm">
				<h2>Crear Administrador</h2>
				<form action="administradoresCumpleanios" method="POST" enctype="multipart/form-data">
			    @csrf
			    	<br>
		            <label>Correo electrónico *:  </label>
		            <input type="email" name="correo" placeholder="user@uniagustiniana.edu.co" require><br>
		            <label>Nombre del usuario:</label>
		            <input type="name" name="name" placeholder="Nombre del usuario" require><br>
		            <center>
		                <button type="submit" class="btn btn-primary">Enviar</button>
		            </center>
		            <br><br>
	    		</form>
    		</div>
    			<div class="col-sm">
    				<center>
    					<h2>Editar o Eliminar administradores</h2>
    				</center>

    				<table class="table text-center">
					    <thead>
					      <tr>
					        <th>Nombre</th>
					        <th>Correo</th>
					        <th>Editar</th>
					        <th>Eliminar</th>
					      </tr>
					    </thead>
					    <tbody>
						    <form action="admin-cumple-update" method="POST" enctype="multipart/form-data">
	    					@csrf
						      @foreach($admins as $admin)
							    <tr>
							    	<td>
							    		<input type="text" name="updatename{{$admin->id}}"  value="{{$admin->nombre}}">
							    	</td>
							    	<td>
							    		<input type="text" name="updatecorreo{{$admin->id}}"  value="{{$admin->correo}}">
							    	</td>
							    	<td>
							    		<a href="" class="btn btn-primary">
                                    		<button name="btn-actualizar" type="submit" class="btn btn-primary" value="{{$admin->id}}">Actualizar</button>
                                		</a>
							    	</td>
							    	<td>
							    		<a href="../cumpleanios/eliminarAdminCumple/{{$admin->id}}">
							    			<button type="button" class="btn btn-danger">X</button>
							    		</a>
							    		
							    	</td>
							    </tr>
						    	@endforeach
							</form>
					    </tbody>
					</table>
    			</div>
    	</div>
    </div>

	<div class="footer">
		<x-footer/>	
	</div>
@stop