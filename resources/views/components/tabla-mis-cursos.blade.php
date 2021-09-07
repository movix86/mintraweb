<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 padding-20" align="center">
        <div class="container" style="overflow: auto;">
            <table class="table table-primary table-hover">
                {{--INCLUDE FUNCIONA PARA GUARDADO EXITOSO--}}
                @include('flash-message')
                {{--ERRORS FUNCIONA PARA VALIDACION DE CAMPOS CON UN REUQEST--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
            <table class="table table-primary table-hover">
                <thead>
                    <tr>
                        <th class="w-40">Curso</th>
                        <th class="w-20">Estado</th>
                        <th class="w-20">Aprobado</th>
                        <th class="w-20">Certificado</th>
                    </tr>
                </thead>
                <tbody>
                    {{--AQUI INICIA LA LOGICA QUE MUESTRA EL AVANCE DE LOS CURSOS DE USUARIO--}}
                    @if (isset($data))
                        @php $i = 0; $p = []; $approved = []; @endphp
                        @foreach ($data['users_courses'] as $user_course)
                            @php
                                $p[] = $user_course->progress;
                                $approved[] = $user_course->approved;
                                $certificate[] = $user_course->certificate;
                            @endphp
                        @endforeach
                        @foreach ($data['course'] as $item)
                            <tr>
                                <td class="w-40">{{ $item->name }}</td>
                                <td class="w-20">
                                    @if ($p[$i] == '0%')
                                        <i class="fa fa-circle" style="font-size:15px;color:red"></i>
                                    @else
                                        <i class="fa fa-circle" style="font-size:15px;color:green"></i>
                                    @endif
                                    <a href="{{ route('final-course', [Auth::user()->id, $item->id]) }}">Finalizar</a>
                                </td>
                                <td class="w-20">
                                    {{--MANSAJE DE APROBADO CURSO POR PARTE DE ADMINISTRADOR--}}
                                    @if ($approved[$i] == 'no')
                                        <i class="fa fa-cogs" style="font-size:22px;color:red"></i>
                                        <span>No</span>
                                    @else
                                        <i class="fa fa-angellist" style="font-size:28px;color:green"></i>
                                        <span>Si</span>
                                    @endif
                                </td>
                                <td class="w-20">
                                    {{--DESCARGA DE ARCHIVOS--}}

                                    @if ($approved[$i] == 'no')
                                        <i class="fa fa-cloud-download" style="font-size:25px;color:black" title="Finalice el curso para recibir su certificado"></i>
                                    @else
                                        <a href="{{ $certificate[$i] }}" download>
                                            <i class="fa fa-cloud-download" style="font-size:25px;color:green"></i>
                                        </a>
                                    @endif
                                </td>
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
