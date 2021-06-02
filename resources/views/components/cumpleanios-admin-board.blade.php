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
    <div class="row date-born-box">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            {{--FORMULARIO QUE CARGA UN DOCUMENTO TIPO GOOGLE--}}
            <form action="{{url('/cumpleanios/csv-cumpleanios')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group file-csv">
                    <h5>Archivo CSV -  Cumpleaños</h5>
                    <input class="form-control-file" type="file" name="file">
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            {{--INGRESA URUSIO MANUAL--}}

            <form action="{{url('/cumpleanios/nuevo-cumpleanios')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="manual-date-bord">


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Nombre</span>
                        </div>
                        <input type="text" class="form-control" name="inputnombre" placeholder="Crear nuevo usuario">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Nacimiento</span>
                        </div>
                        <input type="date" id="date" name="inputfecha" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlFile1">Imagen</label>
                        <input class="form-control-file" type="file" name="file">
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>



    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {{--MUESTRA LOS USUARIOS CREADOS EN UNA TABLA--}}
            <table class="table table-hover">
		        <tr>
				    <th scope="col">Imagen</th>
				    <th scope="col">Nombre</th>
				    <th scope="col">Fecha de Nacimiento</th>
				    <th scope="col">Eliminar y/o Editar</th>
		 		</tr>
		        <tbody>
                    @if (isset($cumpleanios))
                        @foreach($cumpleanios as $cumpleanio)
                            <form action="{{ url('/cumpleanios/cumpleanios-update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <tr>
                                        <input type="hidden" name="id" id="id" value="{{$cumpleanio->id}}">
                                        <td>
                                            <img src="{{asset($cumpleanio->img)}}" alt="IMAGEN-SLIDER" class="img-cumpleanios-admin">
                                        </td>
                                        <td>
                                            <input type="text" name="updatename{{$cumpleanio->id}}" value="{{$cumpleanio->nombre}}" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                        </td>
                                        <td>
                                            <input type="date" name="updatefecha{{$cumpleanio->id}}" value="{{$cumpleanio->fecha}}" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                        </td>
                                        <td>

                                            <a href="{{ url('/cumpleanios/eliminarCumpleanios/' . $cumpleanio->id) }}" class="btn btn-danger btn-sm">
                                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true">
                                                    X
                                                </span>
                                            </a>
                                            <button name="btn-actualizar" type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                        </td>
                                    </tr>
                            </form>
                        @endforeach
                    @endif
			    </tbody>
		    </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if (isset($cumpleanios))
                {{ $cumpleanios->links('components.pagination-links') }}
            @endif
        </div>
    </div>



</div>

