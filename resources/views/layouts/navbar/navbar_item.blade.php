<ul class="navbar-nav ms-auto">
    <!-- Authentication Links -->
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                <a class="dropdown-item {{ Request::is('dashboard*') ? 'active': '' }}" href="{{ route('dashboard.dashboard') }}">
                    Dashboard
                </a>

                <a class="dropdown-item {{ Request::is('artist*') ? 'active': '' }}" href="{{ route('artist.index') }}">
                    Artist
                </a>

                <a class="dropdown-item {{ Request::is('album*') ? 'active': '' }}" href="{{ route('album.index') }}">
                    Albums
                </a>

                <hr >

                <a class="dropdown-item" href="{{ route('other.shortest_word') }}">
                    Shortest Word
                </a>

                <a class="dropdown-item" href="{{ route('other.island') }}">
                    Count the island
                </a>

                <a class="dropdown-item" href="{{ route('other.search') }}">
                    Word Search
                </a>

                <hr >

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </li>
    @endguest
</ul>
