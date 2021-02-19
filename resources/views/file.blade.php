<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Formulario de subida de archivos FILE</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
	<h1>Editar Sliders</h1>
	<h2>Listado de sliders</h2>
	
	<div class="container">
		<div class="row text-center">
			@foreach($sliders as $slider)
			
					<div class="col-md-4">
						{{$slider->id}}
						<center>
							<a href="{{$slider->descripcion}}"><img width="80%" src="{{asset('storage'). '/' . $slider->direccion}}" alt="IMAGEN-SLIDER"></a>
						</center>
						<br>
						<input type="text" name="destinatario" placeholder="{{$slider->direccion}}">
						<a href="/eliminarSlider1/{{$slider->id}}" class="btn btn-danger">
						<span class="glyphicon glyphicon-remove-circle" aria-hidden="true">
							X
						</span>
						</a>
						<br>
						<a href="/actualizarSlider/{{$slider->id}}/" class="btn btn-primary">
							<span class="glyphicon glyphicon-remove-circle" aria-hidden="true">
								Actualizar
							</span>
						</a>
					</div>						
			@endforeach
		</div>
	</div>

	<hr>

	<div class="container">
		<div class="row text-center">
			<div class="col-md-4">
				<span class="fa-stack fa-4x">
					<i class="fas fa-circle fa-stack-2x text-primary"></i>
					<i class="fas fa-file-medical fa-stack-1x fa-inverse"></i>
				</span>
			</div>
			
			<form action="file" method="POST" enctype="multipart/form-data">
				@csrf
				
					<div class="col-md-6">
						<br><br>
						URL a direccionar : 
						<input type="text" name="etiquetaAlt"><br>
						Imagen :
						<input type="file" name="file"><br><br>
						<center>
							<a href="/eliminarSlider" class="btn btn-danger">
								<span class="glyphicon glyphicon-remove-circle" aria-hidden="true">
									Eliminar
								</span>
							</a>
							<button type="submit" class="btn btn-primary">Enviar</button>
						</center>
						<br><br>
					</div>
			</form>
		</div>
	</div>
</body>
</html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>