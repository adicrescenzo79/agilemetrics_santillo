<header>
<nav class="text-capitalize navbar navbar-expand-md navbar-light shadow-sm filter">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/welcome') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->

        @guest
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Area Iscritti</a>
        </li>
        <!-- @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">Iscriviti</a>
        </li>
        @endif -->
        @else
        <li class="nav-item dropdown ">
          <a id="navbarDropdown" class="text-capitalize nav-link dropdown-toggle {{ Request::routeIs('admin.*') ? 'active' : '' }}" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}

          </a>

          <div class="dropdown-menu dropdown-menu-right bg-primary-pers" aria-labelledby="navbarDropdown">
            @if (Auth::user()->email == "luca.santillo@gmail.com")
            <a class="dropdown-item" href="{{route('admin.posts.index')}}">Gestione Post</a>
            <a class="dropdown-item" href="{{route('admin.articles.index')}}">Gestione Articoli</a>

            @endif
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
    </div>
  </div>
</nav>


</header>
<script>
</script>