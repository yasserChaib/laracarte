<nav class="navbar navbar-expand-md navbar-dark static-top bg-dark">
<div class="container">
  <a class="navbar-brand" href="{{ route('root_path') }}">{{config('app.name')}}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{Route::currentRouteName() == 'root_path' ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('root_path') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item {{Route::currentRouteName() == 'about_path' ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('about_path') }}">About</a>
      </li>
      {{-- <li class="nav-item {{Route::currentRouteName() == 'artisan_path' ? 'active' : ''}}">
        <a class="nav-link" href="#">Artisan</a>
      </li> --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Planet</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Laravel.com</a>
          <a class="dropdown-item" href="#">Laravel.io</a>
          <a class="dropdown-item" href="#">Laracasts</a>
          <a class="dropdown-item" href="#">Laravel News</a>
          <a class="dropdown-item" href="#">Larachat</a>
        </div>
      </li>
      <li class="nav-item">
      <a class="nav-link {{Route::currentRouteName() == 'contact_path' ? 'active' : ''}}" href="{{ route('contact_path') }}">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName() == 'page1_path' ? 'active' : ''}}" href="{{ route('page1_path') }}">Commentaire 1</a>
      </li>
      <li class="nav-item">
          <a class="nav-link {{Route::currentRouteName() == 'page2_path' ? 'active' : ''}}" href="{{ route('page2_path') }}">commentaire 2</a>
      </li>
    </ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-link dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->FullName }} <span class="caret"></span>
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
</div> 
</nav>