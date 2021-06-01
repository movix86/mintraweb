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
{{--ERRORS FUNCIONA PARA VALIDACION DE CAMPOS CON UN REUQEST--}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-medios">
        <form action="{{ url('/medios/subir_medio') }}" method="post" enctype="multipart/form-data" class="md-form">
            @csrf
            {{--<p>Archivos:</p>--}}
            <input type="file" id="file-all" name="file-all">

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 form-medios">
        <table class="table table-hover">
            <thead>
                <tr align="center">
                    <th>Archivo</th>
                    <th>Ver</th>
                </tr>
            </thead>
        </table>
        <section class="file-visor">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        @if (isset($archivos))
                            @for ($i = 0; $i < count($archivos); $i++)
                                @if($archivos[$i] !== '.gitignore' && $archivos[$i] !== '.')
                                    <tr>
                                        <td><i class="material-icons">image</i><a href="javascript:void(0);" onclick="show_data_file('{{ $archivos[$i] }}')">{{ $archivos[$i] }}</a></td>
                                        <td><a href="{{ url('storage/'.$archivos[$i]) }}" target="_blank" onclick="show_data_file('{{ $archivos[$i] }}')">Ver</a></td>
                                    </tr>
                                @endif
                            @endfor
                        @endif
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 form-medios">
        <table class="table table-hover">
            <thead>
                <tr align="center">
                    <th>info Archivo</th>
                </tr>
            </thead>
        </table>
        <section class="file-visor data-file-visor" id="file-visor">

        </section>
    </div>
</div>
