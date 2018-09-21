<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/"><i class="fas fa-home"></i> Accueil</a>
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
                
                @if(Route::is('post.*') == true)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('post.archiveList')}}"><i class="fas fa-archive"></i> Archive</a>
                </li> 
                @endif
            </ul>
            @if(Route::is('post.*') == false)
                <form class="form-inline my-2 my-lg-0"  action="{{ route('search') }}" method="get">
                    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            @endif
            <ul class="navbar-nav">
                @guest
                
                @else
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('post.index') }}"><i class="fas fa-columns"></i> {{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item dropdown ml-auto">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest   
            </ul>
        </div>
    </div>
</nav>