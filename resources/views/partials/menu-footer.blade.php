<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                @if(Route::is('post.*') == false)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('stage')}}">Stage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('formation')}}">Formation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>