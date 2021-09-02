<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 padding-20" align="center">
        <div class="container" style="overflow: auto;">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th class="w-35">Nombre</th>
                        <th class="w-35">Correo</th>
                        <th class="w-30">Creacion cuenta</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($data))
                        <tr>
                            <td class="w-35">{{ $data['user']->name }} {{ $data['user']->lastname }}</td>
                            <td class="w-35">{{ $data['user']->email }}</td>
                            <td class="w-30">{{ $data['user']->created_at }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 padding-20" align="center">
        <div class="container" style="overflow: auto;">
            {{--
            <h2>Hoverable Dark Table</h2>
            <p>The .table-hover class adds a hover effect (grey background color) on table rows:</p>
            --}}
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th class="w-40">Curso</th>
                        <th class="w-20">Estado</th>
                        <th class="w-20">Aprobado</th>
                        <th class="w-20">Certificado</th>
                    </tr>
                </thead>
                <tbody>
                    {{--AQUI INICIA LA LOGICA QUE JUESTRA EL AVANCE DE LOS CURSOS DE USUARIO--}}
                    @if (isset($data))
                        @php $i = 0; $p = []; @endphp
                        @foreach ($data['users_courses'] as $user_course)
                            @php
                                $p[] = $user_course->progress;
                            @endphp
                        @endforeach
                        @foreach ($data['course'] as $item)
                            <tr>
                                <td class="w-40">{{ $item->name }}</td>
                                <td class="w-20">{{ $p[$i] }}</td>
                                <form>
                                    <td class="w-20">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switch1">
                                            <label class="custom-control-label" for="switch1">Aprobar</label>
                                        </div>
                                    </td>
                                    <td class="w-20">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Certificado</label>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    @endif
                    {{--AQUI TERMINA LA LOGICA QUE MUESTRA EL AVANCE DE LOS CURSOS DE USUARIO--}}
                </tbody>
            </table>
        </div>
    </div>
    {{--
    <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
        <a href="{{ route('suscriptores') }}"><i class="fa fa-vcard-o" style="font-size:36px"></i><br><p>Inscripciones <br>Estudiantes</p></a>
    </div>
    --}}
</div>
