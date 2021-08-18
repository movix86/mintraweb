<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 15px;">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/cursos/categorias') }}">Categorias</a></li>
                @if (isset($data))
                    <li class="breadcrumb-item"><a href="{{ url('/cursos/categorias/de/' . $data->category)  }}">Cursos de {{ ucfirst($data->category) }}</a></li>
                    <li class="breadcrumb-item active">{{$data->name}}</li>
                @endif
            </ol>
        </nav>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
        <div class="jumbotron" style="height: 500px;">
            <h1 class="display-4">
                @if (isset($data))
                    {{ $data->name }}
                @endif
            </h1>
            <p class="lead">
                @if (isset($data))
                    {{ $data->description }}
                @endif
            </p>
            <hr class="my-4">
            <p>Cursos uniagustiniana de la categoria de @if(isset($data)) {{$data->category}}@endif</p>
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="#" role="button">Inscribete</a>
            </p>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3">
        <div class="jumbotron" style="height: 500px;">
            <h5 class="display-4">Mas Cursos</h5>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        </div>
    </div>
</div>
