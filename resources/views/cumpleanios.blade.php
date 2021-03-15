@extends('home.base')
@section('nav')
    <x-nav/>
@endsection
<title>Vista Cumpleaños</title>
@section('contenido')
<!--Trae iconos de fontAwesome-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<table class="table table-hover table-striped">
        <tr>
		    <th>Imagen</th>
		    <th>Nombre</th>
		    <th>Fecha</th>
		    <th>Editar y/o eliminar</th>
 		</tr>
        <tbody>
        	<form action="cumpleanios-update" method="POST" enctype="multipart/form-data">
	    	@csrf
				@foreach($cumpleanios as $cumpleanio)
				<tr>
			        <td>
						<img style="border-radius: 100px" width="100px" src="{{asset('storage'). '/' . $cumpleanio->img}}" alt="IMAGEN-SLIDER">
			    	</td>
			    	<td>
			    		<input type="text" name="updatename{{$cumpleanio->id}}"  value="{{$cumpleanio->nombre}}">
			    	</td>
			    	<td>
			    		<input id="date" name="updatefecha{{$cumpleanio->id}}" type="date" value="{{$cumpleanio->fecha}}">
			    	</td>
			    	<td>
			    		<br>
	                    <a href="/eliminarCumpleanios/{{$cumpleanio->id}}" class="btn btn-danger">
	                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true">
	                        X
	                    </span>
	                    </a>
	                    <a href="" class="btn btn-primary">
	                        <button name="btn-actualizar" type="submit" class="btn btn-primary" value="{{$cumpleanio->id}}">Actualizar</button>
	                    </a>
			    	</td>
			    </tr>	
			    @endforeach
			</form>
	    </tbody>
    </table>
    <br>
    <hr>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-user-plus fa-stack-1x fa-inverse"></i>
                </span>
            </div>

 

            <form action="nuevo-cumpleanios" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-6">
                        <br><br>
                        <strong>Nombre *:</strong>
                        <input type="text" name="inputnombre"><br><br>
                        <strong>Fecha *:</strong>
                        <input id="date" name="inputfecha" type="date"><br><br>
                        <strong>Imagen</strong>
                        <input type="file" name="file"><br><br>
                        <center>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </center>
                        <br><br>
                    </div>
            </form>
        </div>
    </div>
    {{$cumpleanios->links()}}
@stop