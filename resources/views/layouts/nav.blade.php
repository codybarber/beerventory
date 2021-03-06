<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        {{-- @if (Route::has('login'))
          <div class="top-left links">
              <a href="{{ url('/dashboard') }}">Beerventory</a>
          </div>
            <div class="top-right links">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                    <a href="{{ url('/beers') }}">Beers</a>
                    <a href="{{ url('/add_beer') }}">Add a Beer</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif --}}

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="links">
                    <a href="{{ url('/dashboard') }}">Beerventory</a>
                </li>
                <li class="links">
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                </li>
                <li class="links">
                    <a href="{{ url('/beers') }}">Beers</a>
                </li>
                <li class="links">
                    <a href="{{ url('/add_beer') }}">Add a Beer</a>
                </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
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
