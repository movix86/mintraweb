<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Formulario de subida de archivos FILE</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
<div class="col-sm-8">
	<h2>Listado de sliders</h2>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th width="20px">ID</th>
				<th width="20px">IMAGEN</th>
				<th width="20px">BORRAR</th>
				<th width="20px">UPDATED_AT</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sliders as $slider)
				<tr>
					<td>{{$slider->id}}</td>
					<td>
						<center>
							<a href="{{$slider->descripcion}}"><img width="80%" src="{{asset('storage'). '/' . $slider->direccion}}" alt="IMAGEN-SLIDER"></a>
						</center>
					</td>
					<td>
						<a href="/eliminarSlider1/{{$slider->id}}" class="btn btn-danger">
						<span class="glyphicon glyphicon-remove-circle" aria-hidden="true">
							Eliminar Slider
						</span>
					</a>
					</td>
					<td>{{$slider->updated_at}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

</body>
</html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>