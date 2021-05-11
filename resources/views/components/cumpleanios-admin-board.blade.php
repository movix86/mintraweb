<title>Vista Cumpleaños</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
{{--ERRORS FUNCIONA PARA VALIDACION DE CAMPOS CON UN REUQEST--}}
@include('flash-message')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
	<form action="{{url('/csv-cumpleanios')}}" method="POST" enctype="multipart/form-data">
	    @csrf
	    <div class="col-md-6">
	        <br><br>
	        <strong>Archivo csv</strong>
	        <input type="file" name="file"><br><br>
	        <center>
	            <button type="submit" class="btn btn-primary">Enviar</button>
	        </center>
	    </div>
    </form>
	<hr>
    <div class="row text-center">
        <div class="col-md-4">
            <span class="fa-stack fa-4x">
                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                <i class="fas fa-user-plus fa-stack-1x fa-inverse"></i>
            </span>
        </div>
        <form action="{{url('/cumpleanios/nuevo-cumpleanios')}}" method="POST" enctype="multipart/form-data">
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
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </center>
            </div>
        </form>
    </div>
</div>
<hr>
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
			<table class="table table-hover table-striped">
		        <tr>
				    <th scope="col">Imagen</th>
				    <th scope="col">Nombre</th>
				    <th scope="col">Fecha</th>
				    <th scope="col">Editar y/o eliminar</th>
		 		</tr>
		        <tbody>
                    @if (isset($cumpleanios))
                        @foreach($cumpleanios as $cumpleanio)
                            <form action="{{ url('/cumpleanios/cumpleanios-update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <tr>
                                        <input type="hidden" name="id" id="id" value="{{$cumpleanio->id}}">
                                        <td>
                                            <img style="border-radius: 100px" width="100px" src="{{asset($cumpleanio->img)}}" alt="IMAGEN-SLIDER">
                                        </td>
                                        <td>
                                            <input type="text" name="updatename{{$cumpleanio->id}}"  value="{{$cumpleanio->nombre}}">
                                        </td>
                                        <td>
                                            <input id="date" name="updatefecha{{$cumpleanio->id}}" type="date" value="{{$cumpleanio->fecha}}">
                                        </td>
                                        <td>
                                            <br>
                                            <a href="{{ url('/cumpleanios/eliminarCumpleanios/' . $cumpleanio->id) }}" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true">
                                                    X
                                                </span>
                                            </a>
                                            <button name="btn-actualizar" type="submit" class="btn btn-primary">Actualizar</button>
                                        </td>
                                    </tr>
                            </form>
                        @endforeach
                    @endif
			    </tbody>
		    </table>
		</div>
	</div>
</div>
<br>
@if (isset($cumpleanios))
    {{ $cumpleanios->links('components.pagination-links') }}
@endif
<br>
