<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 15px;">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/cursos/categorias') }}">Categorias</a></li>
                @if (isset($data))
                    <li class="breadcrumb-item"><a href="{{ url('/cursos/categorias/de/' . $data['course']->category)  }}">Cursos de {{ ucfirst($data['course']->category) }}</a></li>
                    <li class="breadcrumb-item active">{{$data['course']->name}}</li>
                @endif
            </ol>
        </nav>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
        <div class="jumbotron" style="height: 100%;">
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
            <h1 class="display-4">
                @if (isset($data))
                    {{ $data['course']->name }}
                @endif
            </h1>
            <p class="lead">
                @if (isset($data))
                    {{ $data['course']->description }}
                @endif
            </p>
            <hr class="my-4">
            <p class="lead">
                @if(isset($data))
                   {!! $data['course']->code_block !!}
                @endif
            </p>
            <p>Cursos uniagustiniana de la categoria de @if(isset($data)) {{$data['course']->category}}@endif</p>

            <p class="lead">
                @if(isset($data))
                <a class="btn btn-primary btn-lg" href="{{ route('suscription', ["user" => Auth::user()->id, "course" => $data['course']->id ]) }}" role="button">Inscribete</a>
                @endif
            </p>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3">
        <div class="jumbotron" style="height: 500px;">
            <h3>Otros cursos de tú interés</h3>
            @if (isset($data))
                <p>{{ $data['course']->category }}</p>
            @endif
            @if (isset($data))
                @foreach ($data['category'] as $item)
                <a href="{{ url('/cursos/' . $item->id . '/' . $item->name) }}">
                    <p class="lead">
                        {{ $item->name }}
                    </p>
                </a>
                <hr class="my-4">
                @endforeach
            @endif
        </div>
    </div>
</div>
