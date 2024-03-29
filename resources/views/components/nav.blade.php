

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(19, 44, 100)">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/intraweb-head.png') }}" alt="mintraweb" width="60%"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            {{--
            <li class="nav-item">
                <a class="nav-link" href="#">Directorio</a>
            </li>
            --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('show-pages-wikis') }}">Wikis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('show-pages-events') }}">Eventos</a>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('show-pages-news') }}">Noticias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('allcategories') }}">Cursos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">FQRS</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @if (Route::has('login'))
                    @auth
                            <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            {{--
                        @if (Route::has('register'))
                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                        @endif
                        --}}
                    @endauth
                @endif
                </div>
            </li>
            </ul>
        </div>
        </nav>



