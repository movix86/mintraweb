<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 padding-20" align="center">
        <div class="container" style="overflow: auto;">
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
            <table class="table table-info table-hover">
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
            <table class="table table-info table-hover">
                <thead>
                    <tr>
                        <th class="w-40">Curso</th>
                        <th class="w-10">Estado</th>
                        <th class="w-10">Aprobado</th>
                        <th class="w-20">Certificado</th>
                        <th class="w-20">*</th>
                    </tr>
                </thead>
                <tbody>
                    {{--AQUI INICIA LA LOGICA QUE JUESTRA EL AVANCE DE LOS CURSOS DE USUARIO--}}
                    @if (isset($data))
                        @php $i = 0; $p = []; $id_user = []; @endphp
                        @foreach ($data['users_courses'] as $user_course)
                            @php
                                $p[] = $user_course->progress;
                                $id_user[] = $user_course->id_users;
                                $approved[] = $user_course->approved;
                            @endphp
                        @endforeach
                        @foreach ($data['course'] as $item)
                            <tr>
                                <td class="w-40">{{ $item->name }}</td>
                                <td class="w-10">
                                    @if ($p[$i] == '0%')
                                        <i class="fa fa-times-rectangle-o" style="font-size:30px;color:red"></i>
                                    @else
                                        <i class="fa fa-thumbs-o-up" style="font-size:30px;color:green"></i>
                                    @endif
                                </td>
                                <td class="w-10">
                                    @if ($approved[$i] == 'no')
                                        <a href="{{ route('approved-course', [$id_user[$i], $item->id]) }}">
                                            <i class="fa fa-toggle-off" style="font-size:27px;color:red"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('approved-course', [$id_user[$i], $item->id]) }}">
                                            <i class="fa fa-toggle-on" style="font-size:27px;color:green"></i>
                                        </a>
                                    @endif

                                </td>
                                <form action="{{ route('save-certificate') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <td class="w-20">
                                        <div class="custom-file">
                                            <input type="hidden" id="id_user" name="id_user" value="{{$id_user[$i]}}">
                                            <input type="hidden" id="id_course" name="id_course" value="{{$item->id}}">
                                            <input type="file" class="custom-file-input" id="certificate" name="certificate" required>
                                            <label class="custom-file-label" for="certificate">Certificado</label>
                                        </div>
                                    </td>
                                    <td class="w-20">
                                        <div class="custom-file">
                                            <button type="submit" class="btn btn-outline-success btn-sm">Guardar</button>
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
